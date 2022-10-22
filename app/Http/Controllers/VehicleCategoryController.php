<?php

namespace App\Http\Controllers;

use App\Models\VehicleCategory;
use Illuminate\Http\Request;
use File;

class VehicleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicleCategorys = VehicleCategory::latest()->get();
        return view('content.vehiclecategory.index', compact('vehicleCategorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.vehiclecategory.create');
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
        ]);

        if(VehicleCategory::where('name', 'LIKE', request('name'))->count() > 0) {
            return 2;
//            return redirect()->route('vehiclecategory.create')
//                ->with('message', "Not Added. Vehicle Category with this name already exists.");
        }


        $data = new VehicleCategory;
        $data->name = request('name');
        $data->desc = request('desc');

        if ($request->hasfile('image')) {
            $validatedData = $request->validate([
                'image' => 'required',
                'image.*' => 'mimes:jpg,jpeg,png,gif'
            ]);

            $image=$request->file('image');
            $name = 'VehicleCategory_' . time() . '.' . $image->extension();
            $path = 'assets/uploads/vehiclecategory/' . $name;
            $image->move(public_path('assets/uploads/vehiclecategory'), $name);
            $data->image = $path;
        }

        $data->save();
        return 1;
        return redirect()->route('vehiclecategory.create')
            ->with('message', "Vehicle category Saved Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleCategory  $vehicleCategory
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleCategory $vehicleCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VehicleCategory  $vehicleCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleCategory $vehicleCategory,$vehicleCategoryId)
    {
        $id = decrypt($vehicleCategoryId);
        $vehicleCategory = VehicleCategory::find($id);
        return view('content.vehiclecategory.edit', compact('vehicleCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VehicleCategory  $vehicleCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehicleCategory $vehicleCategory)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $id = decrypt(request('vehicle_cat_id'));
        $vehicleCategory = VehicleCategory::find($id);



        if ($request->hasfile('image')) {
            $validatedData = $request->validate([
                'image' => 'required',
                'image.*' => 'mimes:jpg,jpeg,png,gif'
            ]);

            $image=$request->file('image');

            $name = 'VehicleCategory_' . time() . '.' . $image->extension();
            $path = 'assets/uploads/vehiclecategory/' . $name;
            $image->move(public_path('assets/uploads/vehiclecategory/'), $name);
            $vehicleCategory->update([
                'image' => $path,
            ]);
        }
        else {
            if (request('verify_file') == 0)
            {
            if (File::exists(public_path($vehicleCategory->image))) {
                File::delete(public_path($vehicleCategory->image));
            }
            $vehicleCategory->update([
                'image' => '',
            ]);
        }
        }

        if($vehicleCategory->name!=request('name')){
            if(VehicleCategory::where('name', 'LIKE', request('name'))->count() > 0) {
                return 2;
//                return redirect()->route('vehiclecategory.create')
//                    ->with('message', "Not Updated. Vehicle Category with this name already exists.");
            }
        }

        $vehicleCategory->update([
            'name' => request('name'),
            'desc' => request('desc'),
        ]);


        return 1;
//        return redirect()->route('vehiclecategory')
//            ->with('message', "Vehicle category Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleCategory  $vehicleCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleCategory $vehicleCategory,$vehicleCategoryId)
    {
        $id = decrypt($vehicleCategoryId);
        $vehicleCategory = VehicleCategory::where('id', $id);
        $vehicleCategory->delete();
        return 1;
//        return redirect()->route('vehiclecategory')
//            ->with('message', "Vehicle Category Removed Successfully");
    }
}
