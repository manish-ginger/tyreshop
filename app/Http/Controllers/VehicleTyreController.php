<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleBrand;
use App\Models\VehicleCategory;
use App\Models\VehicleModel;
use App\Models\VehicleTyre;
use Illuminate\Http\Request;
use File;

class VehicleTyreController extends Controller
{
    public function index()
    {
        $rows = VehicleTyre::latest()->get();
        return view('content.vehicletyre.index', compact('rows'));
    }

   public function create()
    {
        $vehicleModels = VehicleModel::latest()->get();
        $vehicleCategories = VehicleCategory::latest()->get();
        $vehicleVariants = Vehicle::latest()->get();
        return view('content.vehicletyre.create', compact('vehicleModels','vehicleCategories','vehicleVariants'));
    }

    public function loadVariants( Request $request )
    {
        $validated = $request->validate(['id' => 'required']);
        $models = Vehicle::where('vehicle_model_id', $request->get('id') )->get();
        $output = [];
        foreach( $models as $model )
        {
            $output[$model->id] = $model->variant;
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
            'vehicle_variant_id' => 'required',
            'vehicle_tyre_year' => 'required',
        ]);

        if(VehicleTyre::where('vehicle_tyre_year', 'LIKE', request('vehicle_tyre_year'))
                ->where('vehicle_category_id',request('vehicle_category_id'))
                ->where('vehicle_brand_id',request('vehicle_brand_id'))
                ->where('vehicle_model_id',request('vehicle_model_id'))
                ->where('vehicle_variant_id',request('vehicle_variant_id'))
                ->count() > 0) {
            return 2;
//            return redirect()->route('vehicletyre.create')
//                ->with('message', "Not Added. Vehicle Tyre with this category,brand,model and variant already exists.");
        }


        $data = new VehicleTyre;
        $data->vehicle_category_id = request('vehicle_category_id');
        $data->vehicle_brand_id = request('vehicle_brand_id');
        $data->vehicle_model_id = request('vehicle_model_id');
        $data->vehicle_variant_id = request('vehicle_variant_id');
        $data->vehicle_tyre_year = request('vehicle_tyre_year');
        $data->desc = request('desc');
        $request->has('approved') ? $approved = 1 : $approved = 0 ;
        $data->approved = $approved;

        if ($request->hasfile('image')) {
            $validatedData = $request->validate([
                'image' => 'required',
                'image.*' => 'mimes:jpg,jpeg,png,gif'
            ]);

            $image=$request->file('image');
            $name = 'VehicleTyre_' . time() . '.' . $image->extension();
            $path = 'assets/uploads/vehicletyre/' . $name;
            $image->move(public_path('assets/uploads/vehicletyre/'), $name);
            $data->image = $path;
        }

        $data->save();

        return 1;
//        return redirect()->route('vehicletyre.create')
//            ->with('message', "Vehicle Tyre Saved Successfully");
    }

    public function show(Vehicle $vehicle)
    {
        //
    }

    public function edit(Vehicle $vehicle,$vehicleTyreId)
    {
        $id = decrypt($vehicleTyreId);
        $vehicleTyre = VehicleTyre::find($id);
        $vehicleCategories = VehicleCategory::latest()->get();
        $vehicleBrands = VehicleBrand::where('vehicle_category_id',$vehicleTyre->vehicle_category_id)->get();
        $vehicleModels = VehicleModel::where('vehicle_category_id',$vehicleTyre->vehicle_category_id)->where('vehicle_brand_id',$vehicleTyre->vehicle_brand_id)->get();
        $vehicleVariants = Vehicle::where('vehicle_category_id',$vehicleTyre->vehicle_category_id)
            ->where('vehicle_brand_id',$vehicleTyre->vehicle_brand_id)
            ->where('vehicle_model_id',$vehicleTyre->vehicle_model_id)
            ->get();
        return view('content.vehicletyre.edit', compact('vehicleTyre','vehicleModels','vehicleCategories','vehicleBrands','vehicleVariants'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $validated = $request->validate([
            'vehicle_category_id' => 'required',
            'vehicle_brand_id' => 'required',
            'vehicle_model_id' => 'required',
            'vehicle_variant_id' => 'required',
            'vehicle_tyre_year' => 'required',
        ]);



        $id = decrypt(request('vehicletyreid'));
        $vehicle = VehicleTyre::find($id);



        if ($request->hasfile('image')) {
            $validatedData = $request->validate([
                'image' => 'required',
                'image.*' => 'mimes:jpg,jpeg,png,gif'
            ]);

            $image=$request->file('image');

            $name = 'VehicleTyre_' . time() . '.' . $image->extension();
            $path = 'assets/uploads/vehicletyre/' . $name;
            $image->move(public_path('assets/uploads/vehicletyre/'), $name);
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

        if($vehicle->vehicle_tyre_year!=request('vehicle_tyre_year')) {
            if (VehicleTyre::where('vehicle_tyre_year', 'LIKE', request('vehicle_tyre_year'))
                    ->where('vehicle_category_id', request('vehicle_category_id'))
                    ->where('vehicle_brand_id', request('vehicle_brand_id'))
                    ->where('vehicle_model_id', request('vehicle_model_id'))
                    ->where('vehicle_variant_id', request('vehicle_variant_id'))
                    ->count() > 0) {
                return 2;
//                return redirect()->back()
//                    ->with('message', "Not Added. Vehicle Tyre with this category,brand,model and variant already exists.");
            }
        }

        $request->has('approved') ? $approved = 1 : $approved = 0 ;
        $vehicle->update([
            'vehicle_model_id' => request('vehicle_model_id'),
            'vehicle_category_id' => request('vehicle_category_id'),
            'vehicle_brand_id' => request('vehicle_brand_id'),
            'vehicle_variant_id' => request('vehicle_variant_id'),
            'vehicle_tyre_year' => request('vehicle_tyre_year'),
            'desc' => request('desc'),
            'approved' => $approved,
        ]);

        return 1;
//        return redirect()->route('vehicletyre')
//            ->with('message', "Vehicle Tyre Updated Successfully");
    }

    public function destroy(Vehicle $vehicle,$vehicleTyreId)
    {
        $id = decrypt($vehicleTyreId);
        $paId = VehicleTyre::where('id', $id);
        $paId->delete();
        return 1;
//        return redirect()->route('vehicletyre')
//            ->with('message', "Vehicle Tyre Removed Successfully");
    }
}
