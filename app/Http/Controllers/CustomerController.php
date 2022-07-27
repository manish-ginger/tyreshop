<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Customervehicle;
use App\Models\Notification;
use App\Models\Servicerecord;
use App\Models\Shop;
use App\Models\VehicleBrand;
use App\Models\VehicleCategory;
use App\Models\VehicleModel;
use App\Models\Vehicle;
use App\Models\VehicleTyre;
use App\Providers\ChangeBookingStatus;
use Illuminate\Http\Request;
use Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function reminderUser()
    {
        $shop_id=Session::get('Shop_ID');
        $customers =Customer::where('shop_id','=',$shop_id)->get();

        $notifications =Notification::where('shop_id','=',$shop_id)->get();
        $notification_shop =Shop::where('id','=',$shop_id)->get();
        $content='';
        $before_days='';
        $allow_reminder=0;



        if($notification_shop[0]->shop_super_status==1) {
            if($notifications[0]->shop_status==1) {
                foreach ($customers as $row) {
                    $allow_reminder=0;
                    $wash_frequency=$row->wash_frequency;
                    if($row->notification_type==1){
                        if($notifications[0]->status==1) {
                            $content = $notifications[0]->content;
                            $before_days = $notifications[0]->before_days;
                            $allow_reminder=1;
                        }
                    }
                        if($row->notification_type==2){
                            $content=$row->content;
                            $before_days=$row->before_days;
                            $allow_reminder=1;
                        }
                    if($allow_reminder==1){
                        $details=collect();
                        $details->shop_id = $shop_id;
                        $details->mto = $row->email;
                        $details->customer_name = $row->name;
                        $details->content = $content;
                        $details->title = 'Reminder for TyreShop Service';
                        $details->type = 'reminder';

                        $customer_id=$row->id;
                        $customervehicle =Customervehicle::where('shop_id','=',$shop_id)->where('customer_id','=',$customer_id)->get();

                        foreach ($customervehicle as $row_vehicle)
                        {
                            $servicerecord =Servicerecord::where('shop_id','=',$shop_id)->where('status','<',4)->where('vehicle_number','=',$row_vehicle->vehicle_number)->get();
                            foreach($servicerecord as $booking){
                                $current_date = time();
                                $booking_date = strtotime($booking->date);
                                $datediff = $current_date - $booking_date;

                                $days_diff=round($datediff / (60 * 60 * 24));
                                $before_days_before=$days_diff-$before_days;

                                if(($before_days_before==0)||($before_days_before==1)||($before_days_before==2))
                                {
                                $details->vehicle_number = $row_vehicle->vehicle_number;
                                $details->date = $booking->date;
                                $details->time = $booking->time;

//                              return view('emails.reminder', compact('details'));
                                ChangeBookingStatus::dispatch($details);
                                }

                                $before_days_before=$days_diff-$wash_frequency;
                                if(($before_days_before==0)||($before_days_before==1)||($before_days_before==2))
                                {
                                    $details->vehicle_number = $row_vehicle->vehicle_number;
                                    $details->date = $booking->date;
                                    $details->time = $booking->time;

//                              return view('emails.reminder', compact('details'));
                                    ChangeBookingStatus::dispatch($details);
                                }
                            }
                        }
                    }
                }
            }
        }
    }


    public function loadBrands( Request $request )
    {
        $validated = $request->validate(['id' => 'required']);
        $brands = VehicleBrand::where('vehicle_category_id', $request->get('id') )->get();

        $output = [];
        $shop_id=Session::get('Shop_ID');
        foreach( $brands as $brand ){

            $brand_shops=$brand->shops;
            $shops_db = explode(',', $brand->shops);
            foreach ($shops_db as $row){
                if($row==$shop_id){
                    $output[$brand->id] = $brand->name;
                }
            }
        }
        return $output;
    }

    public function loadModels( Request $request )
    {
        $validated = $request->validate(['id' => 'required']);
        $models = VehicleModel::where('vehicle_brand_id', $request->get('id') )->get();
        $output = [];
        foreach( $models as $model )
        {
            $output[$model->id] = $model->name;
        }
        return $output;
    }

    public function loadVariants( Request $request )
    {
        $validated = $request->validate(['id' => 'required']);
        $variants = Vehicle::where('vehicle_model_id', $request->get('id') )->get();
        $output = [];
        foreach( $variants as $variant )
        {
            $output[$variant->id] = $variant->variant;
        }
        return $output;
    }

    public function loadTyres( Request $request )
    {
        $validated = $request->validate(['id' => 'required']);
        $tyres = VehicleTyre::where('vehicle_variant_id', $request->get('id') )->get();
        $output = [];
        foreach( $tyres as $tyre )
        {
            $output[$tyre->id] = $tyre->vehicle_tyre_year;
        }
        return $output;
    }


    public function index()
    {
        $shop_id=Session::get('Shop_ID');
        $customers =Customer::where('shop_id','=',$shop_id)->get();
        return view('content.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicle_categories = VehicleCategory::latest()->get();
        $vehicle_models = VehicleModel::latest()->get();
        return view('content.customer.create', compact('vehicle_categories','vehicle_models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'email:rfc,dns',
            'cust_type' => 'required',
            'notification_type' => 'required',
            'mobile' => 'required|numeric|digits_between:5,15',
        ]);

        $data = new Customer;
        $data->name = request('name');
        $data->email = request('email');
        $data->cust_type = request('cust_type');
        $data->mobile = request('mobile');
        $data->whatsapp = request('whatsapp');
        $data->qid = request('qid');
        $data->wash_frequency = request('wash_frequency');
        $data->notification_type = request('notification_type');
        $data->content = request('content');
        $data->before_days = request('before_days');
        $data->dob = request('dob');
        $data->shop_id =Session::get('Shop_ID');
        $data->save();

        return redirect()->route('customer.create')
            ->with('message', "Customer Saved Successfully");

}
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer,$custId)
    {
        $id = decrypt($custId);
        $customer = Customer::find($id);
        return view('content.customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer,$custId)
    {
        $id = decrypt($custId);
        $customer = Customer::find($id);
        return view('content.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'email:rfc,dns',
            'cust_type' => 'required',
            'notification_type' => 'required',
            'mobile' => 'required|numeric|digits_between:5,15',
        ]);

        $id = decrypt(request('customerid'));
        $pack = Customer::find($id);
        $pack->update([
            'name' => request('name'),
            'email' => request('email'),
            'cust_type' => request('cust_type'),
            'mobile' => request('mobile'),
            'whatsapp' => request('whatsapp'),
            'qid' => request('qid'),
            'wash_frequency' => request('wash_frequency'),
            'notification_type' => request('notification_type'),
            'content' => request('content'),
            'before_days' => request('before_days'),
            'dob' => request('dob'),
            'shop_id' => Session::get('Shop_ID'),
        ]);

        return redirect()->route('customer')
            ->with('message', "Customer Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer,$custId)
    {
        $id = decrypt($custId);
        $paId = Customer::where('id', $id);
        $paId->delete();
        return redirect()->route('customer')
            ->with('message', "Removed Successfully");
    }
}
