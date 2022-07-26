<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Shopdetail;
use Hash;
use Session;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop_email=Session::get('Shop_Email');

        $shop = Shop::firstWhere('email',$shop_email);

        return view('content.shop.index', compact('shop'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(shop $shop, $shopId)
    {
        $id = decrypt($shopId);
        $shop = Shop::find($id);
        return view('content.shop.edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        $validated = $request->validate([
            'name' => 'required',
            'licence' => 'required',
            'location' => 'required',
            'contact' => 'required|numeric|digits_between:5,15',
        ]);

        $id = decrypt(request('shopid'));
        $shop = Shop::find($id);
        $shopdetail = Shopdetail::where('shop_id',$id)->first();

        $shop->update([
            'name' => request('name'),
            'desc' => request('desc'),
        ]);


        if (is_null($shopdetail)) {
            $data = new Shopdetail();
            $data->shop_id =$id;
            $data->licence = request('licence');
            $data->location = request('location');
            $data->contact = request('contact');
            $data->owner = request('owner');
            $data->whatsapp = request('whatsapp');
            $data->desc = request('desc');
            $data->save();
        }
        else
        {
            $shopdetail->update([
                'licence' => request('licence'),
                'location' => request('location'),
                'contact' => request('contact'),
                'owner' => request('owner'),
                'whatsapp' => request('whatsapp'),
                'desc' => request('desc'),
            ]);
        }



        return redirect()->route('shop')
            ->with('message', "Shop Updated Successfully");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop,$shopId)
    {
        $id = decrypt($shopId);
        $paId = Shop::where('id', $id);
        $paId->delete();
        return redirect()->route('shop')
            ->with('message', "Shop Removed Successfully");
    }
}
