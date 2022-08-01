<?php

namespace App\Exports;

use DB;
use App\Models\Customervehicle;
use App\Models\Customer;
use App\Models\VehicleCategory;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use App\Models\Package;
use App\Models\Feature;
use App\Models\Coupon;
use App\Http\Controllers\ReportsController;
use Maatwebsite\Excel\Concerns\FromCollection;
use Carbon\Carbon;

class ServiceRecordExport implements FromCollection
{

    protected $request;

    function __construct($request) {
        $this->request = $request;
    }

    public function collection()
    {
        $excel_collection = collect([]);

        if($this->request->type=='booking') {
            $excel_collection->prepend(['SL','Customer Name','Vehicle Number','Brand','Model','Size','Current Odometer','Next Odometer','Status','Type','Time','Date','Coupon','Service','Price']);

            $rows = ReportsController::report_booking_rows($this->request);


            $i=1;
            foreach($rows as $row) {
                $customervehicle_data=Customervehicle::where('vehicle_number','=',$row->vehicle_number)->get();
                $customer_name='';
                $vehicle_category='';
                $brand='';
                $model='';
                $coupon_code='';
                $status='';
                $booking_type='';

                $data =Customer::where('id',$customervehicle_data[0]->customer_id)->get();
                if(isset($data[0]->name)){
                    $customer_name=$data[0]->name;
                }

                $data =VehicleCategory::where('id',$customervehicle_data[0]->vehicle_category)->get();
                if(isset($data[0]->name)){$vehicle_category=$data[0]->name; }

                $data =VehicleBrand::where('id',$customervehicle_data[0]->brand)->get();
                if(isset($data[0]->name)){$brand=$data[0]->name; }

                $data =VehicleModel::where('id',$customervehicle_data[0]->model)->get();
                if(isset($data[0]->name)){$model=$data[0]->name; }

                $coupon_data =Coupon::where('id',$row->coupon)->get();
                if(isset($coupon_data[0]->code)){$coupon_code=$coupon_data[0]->code; }


                if($row->status==0){$status='Waiting';}
                if($row->status==1){$status='Vehicle Received';}
                if($row->status==2){$status='Processing';}
                if($row->status==3){$status='Finished';}

                if($row->booking_type==0){$booking_type='Pre Booked';}
                if($row->booking_type==1){$booking_type='Direct';}


                $excel_collection->push((object)[
                    'SL' => $i,
                    'customer_name' => $customer_name,
                    'vehicle_number' => $row->vehicle_number,
                    'brand' => $vehicle_category,
                    'model' => $brand,
                    'size' => $model,
                    'current_odo' => $row->curr_odo_reading,
                    'next_odo' => $row->next_odo_reading,
                    'status' => $status,
                    'booking_type' => $booking_type,
                    'time' => $row->time,
                    'date' => $row->date,
                    'coupon' => $coupon_code,
                    'service' => $row->feature_name,
                    'price' => $row->discounted_price,
                ]);
                $i++;
            }
        }

        if($this->request->type=='package') {


            $excel_collection->prepend(['SL','Customer Name','Package Name','Validity','Date','Expiry Date']);


            $rows = ReportsController::report_package_rows($this->request);

            $i=1;
            foreach($rows as $row) {
                $customervehicle_data=Customervehicle::where('customer_id','=',$row->customer_id)->get();
                $customer_name='';
                $package_name='';

                $data =Customer::where('id',$customervehicle_data[0]->customer_id)->get();
                if(isset($data[0]->name)){$customer_name=$data[0]->name;}

                $data =Package::where('id',$row->package_id)->get();
                if(isset($data[0]->title)){$package_name=$data[0]->title;}

                $package_purchase_date=$row->created_at;
                $package_validity_date = Carbon::parse($package_purchase_date)->addDays($row->validity);

                $excel_collection->push((object)[
                    'SL' => $i,
                    'customer_name' => $customer_name,
                    'package_name' => $package_name,
                    'validity' => $row->validity,
                    'date' => $row->created_at,
                    'expiry_date' => $package_validity_date,
                ]);
                $i++;
            }
        }
        return $excel_collection;
    }
}
