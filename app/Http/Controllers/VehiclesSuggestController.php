<?php

namespace App\Http\Controllers;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shop_id=Session::get('Shop_ID');
        $messages=VehiclesSuggest::where('shop_id','=',$shop_id)->get();
        return view('content.vehiclesuggest.create',compact('messages'));
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
            'brand' => 'required',
        ]);

        $data = new VehiclesSuggest();
        $data->shop_id =Session::get('Shop_ID');
        $data->brand = request('brand');
        $data->save();

        return redirect()->route('message.create')
            ->with('message', "Message Sent Successfully");
    }
}
