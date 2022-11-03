<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Customervehicle;
use App\Models\Package;
use App\Models\VehicleCategory;
use App\Models\Servicerecord;
use Illuminate\Http\Request;
use App\Exports\ServiceRecordExport;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use DB;
use PDF;


class ReportsController extends Controller
{
    public function create()
    {
        $shop_id =Session::get('Shop_ID');
        $customers = Customer::where('shop_id',$shop_id)->get();
        $vehicle_categories = VehicleCategory::latest()->get();
        $coupons = Coupon::latest()->get();
        $packages = Package::latest()->get();
        $customervehicles = Customervehicle::where('shop_id','=',$shop_id)->get();
        $show_empty=0;
        return view('content.report.create',compact('show_empty','vehicle_categories','customers','customervehicles','coupons','packages'));
    }


    public static function report_booking_rows(Request $request)
    {
        $from = request('from');
        $to = request('to');
        $vehicle_category = request('vehicle_category');
        $customer_id = request('customer_id');
        $vehicle_number = request('vehicle_number');
        $booking_status = request('booking_status');
        $booking_type = request('booking_type');
        $coupon_show = request('coupon');
        $package_show = request('package');

        ////////Service History
        $rows_services=array();
        $query = DB::table('servicerecords');
        $query->join('customervehicles','customervehicles.vehicle_number','=','servicerecords.vehicle_number');
        $query->join('features','features.id','=','servicerecords.service_id');
        if($from!=''){
            $query->where('date','>=',$from);
        }
        if($to!='') {
            $query->where('date','<=',$to);
        }
        if($coupon_show!='') {
            $query->where('features.coupon',$coupon_show);
        }
        if($booking_status!='') {
            $query->where('status',$booking_status);
        }
        if($booking_type!='') {
            $query->where('booking_type',$booking_type);
        }
        if($vehicle_category!='') {
            $query->where('customervehicles.vehicle_category',$vehicle_category);
        }
        if($customer_id!='') {
            $query->where('customervehicles.customer_id',$customer_id);
        }
        if($vehicle_number!='') {
            $query->where('customervehicles.vehicle_number',$vehicle_number);
        }
        $rows_services = $query->get();

        return $rows_services;
    }

    public static function report_package_rows(Request $request)
    {
        $from = request('from');
        $to = request('to');
        $vehicle_category = request('vehicle_category');
        $customer_id = request('customer_id');
        $vehicle_number = request('vehicle_number');
        $booking_status = request('booking_status');
        $coupon_show = request('coupon');
        $package_show = request('package');

        ////////Package History
        $rows_packages=array();
        $query = DB::table('packagerecords');
        $query->join('customervehicles','customervehicles.customer_id','=','packagerecords.customer_id');
        $query->join('packages','packages.id','=','packagerecords.package_id');
        if($from!=''){
            $query->where('packagerecords.created_at','>=',$from.' 00:00:00');
        }
        if($to!='') {
            $query->where('packagerecords.created_at','<=',$to.' 00:00:00');
        }
        if($package_show!='') {
            $query->where('packages.id',$package_show);
        }
        if($vehicle_category!='') {
            $query->where('customervehicles.vehicle_category',$vehicle_category);
        }
        if($customer_id!='') {
            $query->where('customervehicles.customer_id',$customer_id);
        }
        if($vehicle_number!='') {
            $query->where('customervehicles.vehicle_number',$vehicle_number);
        }
        $rows_packages = $query->get();
        return $rows_packages;
    }

    public function store(Request $request)
    {

        $rows_services = $this->report_booking_rows($request);
        $rows_packages = $this->report_package_rows($request);


        $shop_id =Session::get('Shop_ID');
        $customers = Customer::where('shop_id',$shop_id)->get();
        $vehicle_categories = VehicleCategory::latest()->get();
        $customervehicles = Customervehicle::where('shop_id','=',$shop_id)->get();
        $coupons = Coupon::latest()->get();
        $packages = Package::latest()->get();

        $show_empty=1;

//        return view('content.report.createajax',compact('request','show_empty','rows_services','rows_packages','customervehicles','vehicle_categories','customers','coupons','packages'));
        return view('content.report.create',compact('request','show_empty','rows_services','rows_packages','customervehicles','vehicle_categories','customers','coupons','packages'));
    }

    public function bookingExcelExport(Request $request)
    {
//        $rows_services = $this->report_booking_rows($request);

        $file_name=date("Y-m-d").'__'.date("h:i:sa");
        return Excel::download(new ServiceRecordExport($request), 'Booking_Report_excel__' . $file_name . '.xlsx');
    }

    public function bookingCreatePDF(Request $request) {
        $rows_services = $this->report_booking_rows($request);
        $file_name=date("Y-m-d").'__'.date("h:i:sa");
        $pdf = PDF::loadView('content.report.pdf_booking', compact('rows_services','file_name'));

        return $pdf->download('Booking_Report_PDF__'.$file_name.'.pdf');
    }

    public function packageExcelExport(Request $request)
    {
        $file_name=date("Y-m-d").'__'.date("h:i:sa");
        return Excel::download(new ServiceRecordExport($request), 'Package_Report_Excel__' . $file_name . '.xlsx');
    }

    public function packageCreatePDF(Request $request) {
        $rows_packages = $this->report_package_rows($request);
        $file_name=date("Y-m-d").'__'.date("h:i:sa");
        $pdf = PDF::loadView('content.report.pdf_package', compact('rows_packages','file_name'));
        return $pdf->download('Package_Report_PDF__'.$file_name.'.pdf');
    }

}
