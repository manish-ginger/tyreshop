<?php

namespace App\Http\Controllers;

use App\Exports\ServiceRecordExport;
use App\Models\Customervehicle;
use App\Models\Customer;
use App\Models\Feature;
use App\Models\Servicerecord;
use App\Providers\ChangeBookingStatus;
use Illuminate\Http\Request;
use App\Mail\redcontact;
use Maatwebsite\Excel\Facades\Excel;
use Mail;
use Session;
use PDF;

class ServicerecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop_id=Session::get('Shop_ID');
        $rows =Servicerecord::where('shop_id','=',$shop_id)->get();
        return view('content.servicerecord.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shop_id=Session::get('Shop_ID');
        $customervehicles = Customervehicle::where('shop_id','=',$shop_id)->get();
        $features = Feature::latest()->get();
        return view('content.servicerecord.create', compact('customervehicles','features'));
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
            'vehicle_number' => 'required',
            'status' => 'required',
            'time' => 'required',
            'date' => 'required',
            'service_id' => 'required',
            'booking_type' => 'required',
        ]);


//            if(Servicerecord::where('vehicle_number', 'LIKE', request('vehicle_number'))->count() > 0) {
//                return redirect()->route('servicerecord')
//                    ->with('message', "Not Updated. Service History with this vehicle number already exists.");
//            }


        $data = new Servicerecord;
        $data->vehicle_number = request('vehicle_number');
        $data->status = request('status');
        $data->date = request('date');
        $data->time = request('time');
        $data->service_id = request('service_id');
        $data->booking_type = request('booking_type');
        $data->shop_id =Session::get('Shop_ID');
        $data->save();

        return redirect()->route('servicerecord.create')
            ->with('message', "Booking Saved Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicerecord  $servicerecord
     * @return \Illuminate\Http\Response
     */
    public function show(Servicerecord $row,$id)
    {
        $shop_id =Session::get('Shop_ID');
        $id = decrypt($id);
        $row = Servicerecord::find($id);
        $customervehicle = Customervehicle::where('vehicle_number',$row->vehicle_number)->get();
        return view('content.servicerecord.show', compact('row','customervehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicerecord  $servicerecord
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicerecord $row,$id)
    {
        $shop_id =Session::get('Shop_ID');
        $id = decrypt($id);
        $customervehicles = Customervehicle::where('shop_id',$shop_id)->get();
        $row = Servicerecord::find($id);
        $features = Feature::latest()->get();
        return view('content.servicerecord.edit', compact('row','customervehicles','features'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicerecord  $servicerecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicerecord $servicerecord)
    {
        $validated = $request->validate([
            'vehicle_number' => 'required',
            'status' => 'required',
            'date' => 'required',
            'time' => 'required',
            'service_id' => 'required',
            'booking_type' => 'required',
        ]);



        $id = decrypt(request('id'));
        $data = Servicerecord::find($id);

        $before_status=$data->status;
        $after_status=request('status');

//        if($data->vehicle_number!=request('vehicle_number')){
//            if(Servicerecord::where('vehicle_number', 'LIKE', request('vehicle_number'))->count() > 0) {
//                return redirect()->route('servicerecord')
//                    ->with('message', "Not Updated. Service History with this vehicle number already exists.");
//            }
//        }

        $data->update([
            'vehicle_number' => request('vehicle_number'),
            'status' => request('status'),
            'date' => request('date'),
            'time' => request('time'),
            'service_id' => request('service_id'),
            'booking_type' => request('booking_type'),
            'shop_id' => Session::get('Shop_ID'),
        ]);


        if($before_status!=$after_status) {
            $customervehicle = Customervehicle::where('vehicle_number',request('vehicle_number'))->get();
            $customer_id=$customervehicle[0]->customer_id;
            $customer = Customer::where('id',$customer_id)->get();
            $customer_name = $customer[0]->name;
            $request->request->add(['customer_name' => $customer_name]); //add request
            $request->request->add(['shop_id' => Session::get('Shop_ID')]); //add request
            $details=$request;
            $details->id = $id;
            $details->mto = $customer[0]->email;
            $details->type = 'booking_status';

            ChangeBookingStatus::dispatch($details);


//            return view('emails.redcontact', compact('details'));
//            Mail::to($mto)->send(new redcontact($details));
        }

        return redirect()->route('servicerecord')
            ->with('message', "Booking Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicerecord  $servicerecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicerecord $servicerecord,$id)
    {
        $id = decrypt($id);
        $servicerecord = Servicerecord::where('id', $id);
        $servicerecord->delete();
        return redirect()->route('servicerecord')
            ->with('message', "Booking Removed Successfully");
    }
}
