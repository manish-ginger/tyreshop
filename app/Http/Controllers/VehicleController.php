<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleBrand;
use App\Models\VehicleCategory;
use App\Models\VehicleModel;
use Illuminate\Http\Request;
use File;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::latest()->get();
        return view('content.vehicle.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicleModels = VehicleModel::latest()->get();
        $vehicleCategories = VehicleCategory::latest()->get();
        return view('content.vehicle.create', compact('vehicleModels','vehicleCategories'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_category_id' => 'required',
            'vehicle_brand_id' => 'required',
            'vehicle_model_id' => 'required',
        ]);

        $variant = request('width').'/'.request('ratio').' '.request('construction').request('diameter').request('loadrating').request('speed');

        if(Vehicle::where('variant', 'LIKE', $variant)
                ->where('vehicle_category_id',request('vehicle_category_id'))
                ->where('vehicle_brand_id',request('vehicle_brand_id'))
                ->where('vehicle_model_id',request('vehicle_model_id'))
                ->count() > 0) {
            return redirect()->route('vehicle.create')
                ->with('message', "Not Added. Tyre number with this brand,model and size already exists.");
        }

        $data = new Vehicle;
        $data->vehicle_model_id = request('vehicle_model_id');
        $data->vehicle_category_id = request('vehicle_category_id');
        $data->vehicle_brand_id = request('vehicle_brand_id');
        $data->vehicle_model_id = request('vehicle_model_id');
        $data->width = request('width');
        $data->ratio = request('ratio');
        $data->construction = request('construction');
        $data->diameter = request('diameter');
        $data->loadrating = request('loadrating');
        $data->speed = request('speed');
        $data->variant = request('width').'/'.request('ratio').' '.request('construction').request('diameter').request('loadrating').request('speed');
        $data->desc = request('desc');
        $request->has('approved') ? $approved = 1 : $approved = 0 ;
        $data->approved = $approved;

        if ($request->hasfile('image')) {
            $validatedData = $request->validate([
                'image' => 'required',
                'image.*' => 'mimes:jpg,jpeg,png,gif'
            ]);

            $image=$request->file('image');
            $name = 'Vehicle_' . time() . '.' . $image->extension();
            $path = 'assets/uploads/vehicle/' . $name;
            $image->move(public_path('assets/uploads/vehicle/'), $name);
            $data->image = $path;
        }

        $data->save();


        return redirect()->route('vehicle.create')
            ->with('message', "Vehicle Saved Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle,$vehicleId)
    {
        $id = decrypt($vehicleId);
        $vehicle = Vehicle::find($id);
        $vehicleCategories = VehicleCategory::latest()->get();
        $vehicleBrands = VehicleBrand::where('vehicle_category_id',$vehicle->vehicle_category_id)->get();
        $vehicleModels = VehicleModel::where('vehicle_category_id',$vehicle->vehicle_category_id)->where('vehicle_brand_id',$vehicle->vehicle_brand_id)->get();
        return view('content.vehicle.edit', compact('vehicle','vehicleModels','vehicleCategories','vehicleBrands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $validated = $request->validate([
            'vehicle_category_id' => 'required',
            'vehicle_brand_id' => 'required',
            'vehicle_model_id' => 'required',
        ]);



        $id = decrypt(request('vehicleid'));
        $vehicle = Vehicle::find($id);



        if ($request->hasfile('image')) {
            $validatedData = $request->validate([
                'image' => 'required',
                'image.*' => 'mimes:jpg,jpeg,png,gif'
            ]);

            $image=$request->file('image');

            $name = 'Vehicle_' . time() . '.' . $image->extension();
            $path = 'assets/uploads/vehicle/' . $name;
            $image->move(public_path('assets/uploads/vehicle/'), $name);
            $vehicle->update([
                'image' => $path,
            ]);
        }
        else {
            if (request('verify_file') == 0)
            {
            if (File::exists(public_path($vehicle->image))) {
                File::delete(public_path($vehicle->image));
            }
            $vehicle->update([
                'image' => '',
            ]);
        }
        }

        $variant = request('width').'/'.request('ratio').' '.request('construction').request('diameter').request('loadrating').request('speed');

        if($vehicle->variant!=$variant) {
            if (Vehicle::where('variant', 'LIKE',$variant)
                    ->where('vehicle_category_id', request('vehicle_category_id'))
                    ->where('vehicle_brand_id', request('vehicle_brand_id'))
                    ->where('vehicle_model_id', request('vehicle_model_id'))
                    ->count() > 0) {
                return redirect()->back()
                    ->with('message', "Not Added. Tyre Number with this brand,model and size already exists.");
            }
        }

        $request->has('approved') ? $approved = 1 : $approved = 0 ;
        $vehicle->update([
            'vehicle_model_id' => request('vehicle_model_id'),
            'vehicle_category_id' => request('vehicle_category_id'),
            'vehicle_brand_id' => request('vehicle_brand_id'),
            'width' => request('width'),
            'ratio' => request('ratio'),
            'construction' => request('construction'),
            'diameter' => request('diameter'),
            'loadrating' => request('loadrating'),
            'speed' => request('speed'),
            'variant' => request('width').'/'.request('ratio').' '.request('construction').request('diameter').request('loadrating').request('speed'),
            'desc' => request('desc'),
            'approved' => $approved,
        ]);

        return redirect()->route('vehicle')
            ->with('message', "Vehicle Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle,$vehicleId)
    {
        $id = decrypt($vehicleId);
        $paId = Vehicle::where('id', $id);
        $paId->delete();
        return redirect()->route('vehicle')
            ->with('message', "Vehicle Removed Successfully");
    }
}
