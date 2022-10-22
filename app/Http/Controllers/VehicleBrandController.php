<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\VehicleBrand;
use App\Models\VehicleCategory;
use Illuminate\Http\Request;
use File;

class VehicleBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicleBrands = VehicleBrand::latest()->get();
        $vehicle_categories = VehicleCategory::latest()->get();
        return view('content.vehiclebrand.index', compact('vehicleBrands','vehicle_categories'));
    }

    public function brandpershop()
    {
        $vehicleBrands = VehicleBrand::latest()->get();
        $vehicle_categories = VehicleCategory::latest()->get();
        $shops = Shop::latest()->get();
        return view('content.brandpershop.index', compact('vehicleBrands','vehicle_categories','shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicle_categories = VehicleCategory::latest()->get();
        $shops = Shop::latest()->get();
        return view('content.vehiclebrand.create', compact('vehicle_categories','shops'));
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
            'vehicle_category_id' => 'required',
        ]);

        if(VehicleBrand::where('name', 'LIKE', request('name'))->where('vehicle_category_id',request('vehicle_category_id'))->count() > 0) {
            return 2;
//            return redirect()->route('vehiclebrand.create')
//                ->with('message', "Not Added. Vehicle brand with this category already exists.");
        }

        $data = new VehicleBrand;
        $data->name = request('name');
        $data->desc = request('desc');
        $data->vehicle_category_id = request('vehicle_category_id');

        if ($request->hasfile('image')) {
            $validatedData = $request->validate([
                'image' => 'required',
                'image.*' => 'mimes:jpg,jpeg,png,gif'
            ]);

            $image=$request->file('image');
            $name = 'VehicleBrand_' . time() . '.' . $image->extension();
            $path = 'assets/uploads/vehiclebrand/' . $name;
            $image->move(public_path('assets/uploads/vehiclebrand'), $name);
            $data->image = $path;
        }

        $data->save();
        return 1;
//        return redirect()->route('vehiclebrand.create')
//            ->with('message', "Vehicle brand Saved Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleBrand  $vehicleBrand
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleBrand $vehicleBrand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VehicleBrand  $vehicleBrand
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleBrand $vehicleBrand,$vehicleBrandId)
    {
        $id = decrypt($vehicleBrandId);
        $vehicleBrand = VehicleBrand::find($id);
        $vehicle_categories = VehicleCategory::latest()->get();
        $shops = Shop::latest()->get();
        return view('content.vehiclebrand.edit', compact('vehicleBrand','vehicle_categories','shops'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VehicleBrand  $vehicleBrand
     * @return \Illuminate\Http\Response
     */

    public function update_brandpershop(Request $request, VehicleBrand $vehicleBrand)
    {
        $id = request('vehicle_brand_id');
        $vehicleCategory = VehicleCategory::find($id);

        $shops = '';
        if(request('shops')!='') {
            $shops = implode(', ', request('shops'));
        }

        $vehicleCategory->update([
            'shops' => $shops,
        ]);

        return 1;
//        return redirect()->route('brandpershop')
//            ->with('message', "Vehicle Brand per Shops Successfully");
    }





    public function update(Request $request, VehicleBrand $vehicleBrand)
    {
        $validated = $request->validate([
            'name' => 'required',
            'vehicle_category_id' => 'required',
        ]);

        $id = decrypt(request('vehicle_brand_id'));
        $vehicleBrand = VehicleBrand::find($id);

        if ($request->hasfile('image')) {
            $validatedData = $request->validate([
                'image' => 'required',
                'image.*' => 'mimes:jpg,jpeg,png,gif'
            ]);

            $image=$request->file('image');

            $name = 'VehicleBrand_' . time() . '.' . $image->extension();
            $path = 'assets/uploads/vehiclebrand/' . $name;
            $image->move(public_path('assets/uploads/vehiclebrand/'), $name);
            $vehicleBrand->update([
                'image' => $path,
            ]);
        }
        else {
            if (request('verify_file') == 0)
            {
                if (File::exists(public_path($vehicleBrand->image))) {
                    File::delete(public_path($vehicleBrand->image));
                }
            $vehicleBrand->update([
                'image' => '',
            ]);
        }
        }

        if($vehicleBrand->name!=request('name')) {
            if (VehicleBrand::where('name', 'LIKE', request('name'))->where('vehicle_category_id', request('vehicle_category_id'))->count() > 0) {
                return 2;
//                return redirect()->back()
//                    ->with('message', "Not Edited. Vehicle brand with this category already exists.");
            }
        }

        $vehicleBrand->update([
            'name' => request('name'),
            'vehicle_category_id' => request('vehicle_category_id'),
            'desc' => request('desc'),
        ]);

        return 1;
//        return redirect()->route('vehiclebrand')
//            ->with('message', "Vehicle Brand Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleBrand  $vehicleBrand
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleBrand $vehicleBrand,$vehicleBrandId)
    {
        $id = decrypt($vehicleBrandId);
        $vehicleBrand = VehicleBrand::where('id', $id);
        $vehicleBrand->delete();
        return 1;
//        return redirect()->route('vehiclebrand')
//            ->with('message', "Vehicle Brand Removed Successfully");
    }
}
