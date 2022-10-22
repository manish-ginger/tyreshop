<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Shopdetail;
use App\Models\User;
use App\Models\VehicleBrand;
use Hash;
use File;
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
        $shops = Shop::latest()->get();
        return view('content.shop.index', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = VehicleBrand::latest()->get();
        return view('content.shop.create', compact('brands'));
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
            'email' => 'required',
            'licence' => 'required',
            'location' => 'required',
            'contact' => 'required|numeric|digits_between:5,15',
            'password' => 'required',
        ]);


        if(Shop::where('name', 'LIKE', request('name'))->count() > 0) {
            return 2;
//            return redirect()->route('shop.create')
//                ->with('message', "Not Added. Shop name with this name already exists.");
        }

        if(Shop::where('email', 'LIKE', request('email'))->count() > 0) {
            return 2;
//            return redirect()->route('shop.create')
//                ->with('message', "Not Added. Shop with this email already exists.");
        }

        if(User::where('email', 'LIKE', request('email'))->count() > 0) {
            return 2;
//            return redirect()->route('shop.create')
//                ->with('message', "Not Added. User with this email already exists.");
        }

        $data = new Shop;
        $data->name = request('name');
        $data->email = request('email');
        $data->valdity = request('validity');
        $data->password  = Hash::make(request('password'));
        $request->has('approved') ? $approved = 1 : $approved = 0 ;
        $data->approved = $approved;

        if ($request->hasfile('image')) {
            $validatedData = $request->validate([
                'image' => 'required',
                'image.*' => 'mimes:jpg,jpeg,png,gif'
            ]);

            $image=$request->file('image');
            $name = 'Shop_' . time() . '.' . $image->extension();
            $path = 'assets/uploads/shop/' . $name;
            $image->move(public_path('assets/uploads/shop'), $name);
            $data->image = $path;
        }


        $data->save();

        if($data->id){
        $shopId = $data->id;
        $data = new Shopdetail;
        $data->shop_id = $shopId;
        $data->licence = request('licence');
        $data->location = request('location');
        $data->contact  = request('contact');
        $data->owner = request('ownercontact');
        $data->whatsapp = request('whatsapp');
        $data->desc = request('desc');
        $data->save();
        }
        return 1;
//        return redirect()->route('shop.create')
//            ->with('message', "Shop Saved Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */

    public function show(Shop $shop, $shopId)
    {
        $id = decrypt($shopId);
        $shop = Shop::find($id);
        $brands = VehicleBrand::latest()->get();
        $type = 'view';
        return view('content.shop.edit', compact('shop','type','brands'));
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
        $brands = VehicleBrand::latest()->get();
        return view('content.shop.edit', compact('shop','brands'));
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
            'email' => 'required',
            'licence' => 'required',
            'location' => 'required',
            'contact' => 'required|numeric|digits_between:5,15',
        ]);


        $id = decrypt(request('shopid'));
        $shop = Shop::find($id);

        $shopdetail = Shopdetail::where('shop_id',$id);
        $request->has('approved') ? $approved = 1 : $approved = 0;



        $shopdetail->update([
            'licence' => request('licence'),
            'location' => request('location'),
            'contact' => request('contact'),
            'owner' => request('ownercontact'),
            'whatsapp' => request('whatsapp'),
            'desc' => request('desc'),
        ]);

        if ($request->hasfile('image')) {
            $validatedData = $request->validate([
                'image' => 'required',
                'image.*' => 'mimes:jpg,jpeg,png,gif'
            ]);

            $image=$request->file('image');

            $name = 'Shop_' . time() . '.' . $image->extension();
            $path = 'assets/uploads/shop/' . $name;
            $image->move(public_path('assets/uploads/shop/'), $name);
            $shop->update([
                'image' => $path,
            ]);
        }
        else {
            if (request('verify_file') == 0)
            {
                if (File::exists(public_path($shop->image))) {
                    File::delete(public_path($shop->image));
                }
                $shop->update([
                    'image' => '',
                ]);
            }
        }


        if($shop->name!=request('name')) {
            if (Shop::where('name', 'LIKE', request('name'))->count() > 0) {
                return 2;
//                return redirect()->route('shop')
//                    ->with('message', "Not Added. Shop name with this name already exists.");
            }
        }


        if($shop->email!=request('email')) {
            if (User::where('email', 'LIKE', request('email'))->count() > 0) {
                return 2;
//                return redirect()->route('shop')
//                    ->with('message', "Not Added. User with this email already exists.");
            }
        }


        $shop->update([
            'name' => request('name'),
            'email' => request('email'),
            'valdity' => request('validity'),
            'approved' => $approved,
        ]);



        if(!request('password')==null)
        {
            $shop->update([
                'password' => Hash::make(request('password')),
            ]);
        }

        return 1;
//        return redirect()->route('shop')
//            ->with('message', "Shop Updated Successfully");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function brandShopDelete($id)
    {
        $brands_db = VehicleBrand::latest()->get();

        foreach ($brands_db as $row) {
            $brands_shops_array=array();
            $vehicle_brand = VehicleBrand::where('id', $row->id)->get();
            if (isset($vehicle_brand[0]->shops)) {
                if ($vehicle_brand[0]->shops!='') {
                    $vehicle_brand_shops = $vehicle_brand[0]->shops;
                    $brands_shops_array = explode(',', $vehicle_brand_shops);

                    if ((in_array($id, $brands_shops_array))) {
                        $brands_shops_array = array_diff($brands_shops_array, array($id));
                    }

                    $shops_implode=implode(',',$brands_shops_array);

                    $vehicleBrand = VehicleBrand::find($row->id);

                    $vehicleBrand->update([
                        'shops' => $shops_implode,
                    ]);


                }
            }
        }
    }

     public function destroy(Shop $shop, $shopId)
    {
        $id = decrypt($shopId);

        $this->brandShopDelete($id);

        $paId = Shop::where('id', $id);
        $paId->delete();
        return 1;
//        return redirect()->route('shop')
//            ->with('message', "Shop Removed Successfully");
    }

}
