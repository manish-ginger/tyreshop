<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Customervehicle;
use App\Models\Vehicle;
use App\Models\VehicleBrand;
use App\Models\VehicleCategory;
use App\Models\VehicleModel;
use App\Models\VehicleTyre;
use Illuminate\Http\Request;
use Session;

class CustomervehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop_id=Session::get('Shop_ID');
        $rows =Customervehicle::where('shop_id','=',$shop_id)->get();
        return view('content.customervehicle.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shop_id =Session::get('Shop_ID');
        $vehicle_categories = VehicleCategory::latest()->get();
        $customers = Customer::where('shop_id',$shop_id)->get();
        return view('content.customervehicle.create', compact('vehicle_categories','customers'));
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
            'customer_id' => 'required',
            'vehicle_number' => 'required',
            'vehicle_category' => 'required',
        ]);

        $data = new Customervehicle;
        $data->customer_id = request('customer_id');
        $data->vehicle_number = request('vehicle_number');
        $data->vehicle_category = request('vehicle_category');
        $data->brand = request('brand');
        $data->model = request('model');
        $data->variant = request('variant');
        $data->shop_id =Session::get('Shop_ID');
        $data->save();

        return redirect()->route('customervehicle.create')
            ->with('message', "Customer Vehicle Saved Successfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customervehicle  $customervehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Customervehicle $customervehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customervehicle  $customervehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Customervehicle $row,$id)
    {
        $id = decrypt($id);
        $row = Customervehicle::find($id);
        $customers = Customer::latest()->get();
        $vehicle_categories = VehicleCategory::latest()->get();
        $vehicle_brands = VehicleBrand::where('vehicle_category_id',$row->vehicle_category)->get();
        $vehicle_models = VehicleModel::where('vehicle_category_id',$row->vehicle_category)->where('vehicle_brand_id',$row->brand)->get();
        $variants = Vehicle::where('vehicle_category_id',$row->vehicle_category)->where('vehicle_brand_id',$row->brand)->where('vehicle_model_id',$row->model)->get();
        $tyres = VehicleTyre::where('vehicle_category_id',$row->vehicle_category)
            ->where('vehicle_brand_id',$row->brand)
            ->where('vehicle_model_id',$row->model)
            ->where('vehicle_variant_id',$row->variant)->get();
        return view('content.customervehicle.edit', compact('row','customers','vehicle_categories','vehicle_brands','vehicle_models','variants','tyres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customervehicle  $customervehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customervehicle $customervehicle)
    {
        $validated = $request->validate([
            'customer_id' => 'required',
            'vehicle_number' => 'required',
            'vehicle_category' => 'required',
        ]);

        $id = decrypt(request('id'));
        $data = Customervehicle::find($id);
        $data->update([
            'customer_id' => request('customer_id'),
            'vehicle_number' => request('vehicle_number'),
            'vehicle_category' => request('vehicle_category'),
            'brand' => request('brand'),
            'model' => request('model'),
            'variant' => request('variant'),
            'shop_id' => Session::get('Shop_ID'),
        ]);

        return redirect()->route('customervehicle')
            ->with('message', "Customer Vehicle Updated Successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customervehicle  $customervehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customervehicle $customervehicle,$id)
    {
        $id = decrypt($id);
        $paId = Customervehicle::where('id', $id);
        $paId->delete();
        return redirect()->route('customervehicle')
            ->with('message', "Customer Vehicle Removed Successfully");
    }
}
