<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\VehiclesSuggest;
use Illuminate\Http\Request;
use Session;

class VehiclesSuggestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicleSuggests = VehiclesSuggest::latest()->get();
        $shops = Shop::latest()->get();
        return view('content.vehiclesuggest.index', compact('vehicleSuggests','shops'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'shop_id' => 'required',
            'brand' => 'required',
        ]);

        $data = new VehiclesSuggest;
        $data->shop_id = request('shop_id');
        $data->brand = request('brand');

        $data->save();
        return 1;
//        return redirect()->route('messages')
//            ->with('message', "Message Sent Successfully");

    }
}
