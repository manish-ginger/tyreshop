<?php

namespace App\Http\Controllers;

use App\Models\VehicleBrand;
use App\Models\VehicleCategory;
use App\Models\VehicleModel;
use Illuminate\Http\Request;
use File;

class VehicleModelController extends Controller
{

    public function index()
    {
        $vehicleModels = VehicleModel::latest()->get();
        $vehicleCategories = VehicleCategory::latest()->get();
        $vehicleBrands = VehicleBrand::latest()->get();
        return view('content.vehiclemodel.index', compact('vehicleModels','vehicleCategories','vehicleBrands'));
    }


    public function create()
    {
        $vehicleCategories = VehicleCategory::latest()->get();
        return view('content.vehiclemodel.create', compact('vehicleCategories'));
    }

    public function loadBrands( Request $request )
    {
        $validated = $request->validate(['id' => 'required']);
        $brands = VehicleBrand::where('vehicle_category_id', $request->get('id') )->get();
        //you can handle output in different ways, I just use a custom filled array. you may pluck data and directly output your data.
        $output = [];
        foreach( $brands as $brand )
        {
            $output[$brand->id] = $brand->name;
        }
        return $output;
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'vehicle_category_id' => 'required',
            'vehicle_brand_id' => 'required',
        ]);

        if(VehicleModel::where('name', 'LIKE', request('name'))->where('vehicle_category_id',request('vehicle_category_id'))->where('vehicle_brand_id',request('vehicle_brand_id'))->count() > 0) {
            return 2;
//            return redirect()->route('vehiclemodel.create')
//                ->with('message', "Not Added. Vehicle Model with this category and brand already exists.");
        }


        $data = new VehicleModel;
        $data->name = request('name');
        $data->desc = request('desc');
        $data->vehicle_brand_id = request('vehicle_brand_id');
        $data->vehicle_category_id = request('vehicle_category_id');

        if ($request->hasfile('image')) {
            $validatedData = $request->validate([
                'image' => 'required',
                'image.*' => 'mimes:jpg,jpeg,png,gif'
            ]);

            $image=$request->file('image');
            $name = 'VehicleModel_' . time() . '.' . $image->extension();
            $path = 'assets/uploads/vehiclemodel/' . $name;
            $image->move(public_path('assets/uploads/vehiclemodel'), $name);
            $data->image = $path;
        }

        $data->save();
        return 1;
//        return redirect()->route('vehiclemodel.create')
//            ->with('message', "Vehicle model Saved Successfully");

    }


    public function show(VehicleModel $vehicleModel)
    {
        //
    }


    public function edit(VehicleModel $vehicleModel,$vehicleModelId)
    {
        $id = decrypt($vehicleModelId);
        $vehicleModel = VehicleModel::find($id);
        $vehicleCategories = VehicleCategory::latest()->get();
        $vehicleBrands = VehicleBrand::where('vehicle_category_id', $vehicleModel->vehicle_category_id)->get();
        return view('content.vehiclemodel.edit', compact('vehicleModel','vehicleCategories','vehicleBrands'));
    }


    public function update(Request $request, VehicleModel $vehicleModel)
    {
        $validated = $request->validate([
            'name' => 'required',
            'vehicle_category_id' => 'required',
            'vehicle_brand_id' => 'required',
        ]);



        $id = decrypt(request('vehicle_model_id'));
        $vehicleModel = VehicleModel::find($id);



        if ($request->hasfile('image')) {
            $validatedData = $request->validate([
                'image' => 'required',
                'image.*' => 'mimes:jpg,jpeg,png,gif'
            ]);

            $image=$request->file('image');

            $name = 'VehicleModel_' . time() . '.' . $image->extension();
            $path = 'assets/uploads/vehiclemodel/' . $name;
            $image->move(public_path('assets/uploads/vehiclemodel/'), $name);
            $vehicleModel->update([
                'image' => $path,
            ]);
        }
        else {

            if (request('verify_file') == 0)
            {
            if (File::exists(public_path($vehicleModel->image))) {
                File::delete(public_path($vehicleModel->image));
            }
            $vehicleModel->update([
                'image' => '',
            ]);
        }
        }

        if($vehicleModel->name!=request('name')) {
            if (VehicleModel::where('name', 'LIKE', request('name'))->where('vehicle_category_id', request('vehicle_category_id'))->where('vehicle_brand_id', request('vehicle_brand_id'))->count() > 0) {
                return 2;
//                return redirect()->back()
//                    ->with('message', "Not Added. Vehicle Model with this category and brand already exists.");
            }
        }

        $vehicleModel->update([
            'name' => request('name'),
            'desc' => request('desc'),
            'vehicle_category_id' => request('vehicle_category_id'),
            'vehicle_brand_id' => request('vehicle_brand_id'),
        ]);

        return 1;
//        return redirect()->route('vehiclemodel')
//            ->with('message', "Vehicle model updated Successfully");

    }


    public function destroy(VehicleModel $vehicleModel,$vehicleModelId)
    {
        $id = decrypt($vehicleModelId);
        $vehicleModel = VehicleModel::where('id', $id);
        $vehicleModel->delete();
        return 1;
//        return redirect()->route('vehiclemodel')
//            ->with('message', "Vehicle Model Removed Successfully");
    }
}
