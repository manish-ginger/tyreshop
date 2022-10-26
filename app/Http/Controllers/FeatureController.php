<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Feature;
use App\Models\VehicleBrand;
use App\Models\VehicleCategory;
use App\Models\Vehicle;
use App\Models\Shop;
use App\Models\WashingType;
use App\Models\VehicleModel;
use Illuminate\Http\Request;
use Hash;
use Session;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop_id=Session::get('Shop_ID');
        $features =Feature::where('shop_id','=',$shop_id)->get();
        return view('content.feature.index', compact('features'));
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
        $coupons = Coupon::latest()->get();
        $washing_types = WashingType::latest()->get();
        return view('content.feature.create', compact('vehicle_categories','vehicle_models','coupons','washing_types'));
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
            'feature_name' => 'required',
            'vehicle_category' => 'required',
            'model' => 'required',
            'actual_price' => 'required',
            'discounted_price' => 'required',
            'perc_or_amount' => 'required',
            'loyalty_points' => 'required',
            'loyalty_points_validity' => 'required',
            'slots' => 'required',
        ]);

        $data = new Feature;
        $data->feature_name = request('feature_name');
        $data->vehicle_category = request('vehicle_category');
        $data->brand = request('brand');
        $data->model = request('model');
//        $data->variant = request('variant');
        $data->actual_price = request('actual_price');
        $data->discounted_price = request('discounted_price');
        $data->perc_or_amount = request('perc_or_amount');
        $data->coupon = request('coupon');
        $data->accessory = request('accessory');
//        $data->free_services = request('free_services');
        $data->duration = request('duration');
        $data->loyalty_points = request('loyalty_points');
        $data->loyalty_points_validity = request('loyalty_points_validity');
        $data->slots = request('slots');
        $data->shop_id = Session::get('Shop_ID');

        $data->save();

        return 1;
//        return redirect()->route('feature.create')
//            ->with('message', "Service Saved Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */

    public function show(Feature $feature,$featureId)
    {
        $id = decrypt($featureId);
        $feature = Feature::find($id);
        $vehicle_categories = VehicleCategory::latest()->get();
        $vehicle_brands = VehicleBrand::where('vehicle_category_id',$feature->vehicle_category)->get();
        $vehicle_models = VehicleModel::where('vehicle_category_id',$feature->vehicle_category)->where('vehicle_brand_id',$feature->brand)->get();
        $variants = Vehicle::where('vehicle_category_id',$feature->vehicle_category)->where('vehicle_brand_id',$feature->brand)->where('vehicle_model_id',$feature->model)->get();
        $coupons = Coupon::latest()->get();
        $washing_types = WashingType::latest()->get();
        return view('content.feature.show', compact('feature','vehicle_categories','vehicle_models','coupons','vehicle_brands','variants','washing_types'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function edit(Feature $feature,$featureId)
    {
        $id = decrypt($featureId);
        $feature = Feature::find($id);
        $vehicle_categories = VehicleCategory::latest()->get();
        $vehicle_brands = VehicleBrand::where('vehicle_category_id',$feature->vehicle_category)->get();
        $vehicle_models = VehicleModel::where('vehicle_category_id',$feature->vehicle_category)->where('vehicle_brand_id',$feature->brand)->get();
        $variants = Vehicle::where('vehicle_category_id',$feature->vehicle_category)->where('vehicle_brand_id',$feature->brand)->where('vehicle_model_id',$feature->model)->get();
        $coupons = Coupon::latest()->get();
        $washing_types = WashingType::latest()->get();
        return view('content.feature.edit', compact('feature','vehicle_categories','vehicle_models','coupons','vehicle_brands','variants','washing_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feature $feature)
    {
        $validated = $request->validate([
            'feature_name' => 'required',
            'vehicle_category' => 'required',
            'model' => 'required',
            'actual_price' => 'required',
            'discounted_price' => 'required',
            'perc_or_amount' => 'required',
            'loyalty_points' => 'required',
            'loyalty_points_validity' => 'required',
            'slots' => 'required',
        ]);

        $id = decrypt(request('featureid'));
        $feature = Feature::find($id);
        $feature->update([
            'feature_name' => request('feature_name'),
            'vehicle_category' => request('vehicle_category'),
            'brand' => request('brand'),
            'model' => request('model'),
//            'variant' => request('variant'),
            'actual_price' => request('actual_price'),
            'discounted_price' => request('discounted_price'),
            'perc_or_amount' => request('perc_or_amount'),
            'coupon' => request('coupon'),
            'accessory' => request('accessory'),
//            'free_services' => request('free_services'),
            'duration' => request('duration'),
            'loyalty_points' => request('loyalty_points'),
            'loyalty_points_validity' => request('loyalty_points_validity'),
            'slots' => request('slots'),
            'shop_id' => Session::get('Shop_ID'),
        ]);

        return 1;
//        return redirect()->route('feature')
//            ->with('message', "Service Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feature $feature,$featureId)
    {
        $id = decrypt($featureId);
        $paId = Feature::where('id', $id);
        $paId->delete();
        return 1;
//        return redirect()->route('feature')
//            ->with('message', "Service Removed Successfully");
    }
}
