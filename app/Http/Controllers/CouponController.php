<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Session;
use File;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop_id=Session::get('Shop_ID');
        $coupons =Coupon::where('shop_id','=',$shop_id)->get();
        return view('content.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.coupon.create');
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
            'title' => 'required',
            'code' => 'required',
            'desc' => 'required',
            'perc_or_amount' => 'required',
            'coupon_value' => 'required',
            'validity' => 'required',
        ]);

        if(Coupon::where('title', 'LIKE', request('title'))->count() > 0) {
            return redirect()->route('coupon.create')
                ->with('message', "Not Added. Coupon with this name already exists.");
        }

        if(Coupon::where('code', 'LIKE', request('code'))->count() > 0) {
            return redirect()->route('coupon.create')
                ->with('message', "Not Added. Coupon Code already exists.");
        }


        $data = new Coupon();
        $data->shop_id =Session::get('Shop_ID');
        $data->title = request('title');
        $data->code = request('code');
        $data->status = request('approved');
        $data->desc = request('desc');
        $data->perc_or_amount = request('perc_or_amount');
        $data->coupon_value = request('coupon_value');
        $data->validity = request('validity');


        if ($request->hasfile('files')) {
            $validatedData = $request->validate([
                'files' => 'required',
                'files.*' => 'mimes:jpg,jpeg,png,gif'
            ]);

            foreach ($request->file('files') as $key => $file) {
                $name = 'Coupon_' . time() . $key . '.' . $file->extension();
                $path = 'assets/uploads/coupon/' . $name;
                $file->move(public_path('assets/uploads/coupon'), $name);
                $data->image = $path;
            }

        }

        $data->save();

        return redirect()->route('coupon.create')
            ->with('message', "Coupon Saved Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon,$couponId)
    {
        $id = decrypt($couponId);
        $coupon = Coupon::find($id);
        return view('content.coupon.show', compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon,$couponId)
    {
        $id = decrypt($couponId);
        $coupon = Coupon::find($id);
        return view('content.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        $validated = $request->validate([
            'title' => 'required',
            'code' => 'required',
            'desc' => 'required',
            'perc_or_amount' => 'required',
            'coupon_value' => 'required',
            'validity' => 'required',
        ]);

        $id = decrypt(request('couponid'));
        $data = Coupon::find($id);
        $request->has('approved') ? $approved = 1 : $approved = 0 ;

        if ($request->hasfile('files')) {
            $validatedData = $request->validate([
                'files' => 'required',
                'files.*' => 'mimes:jpg,jpeg,png,gif'
            ]);

            foreach ($request->file('files') as $key => $file) {
                $name = 'Coupon_' . time() . $key . '.' . $file->extension();
                $path = 'assets/uploads/coupon/' . $name;
                $file->move(public_path('assets/uploads/coupon'), $name);
                $data->image = $path;
            }
        }
        else {
            if (request('verify_file') == 0)
            {
                if (File::exists(public_path($data->image))) {
                    File::delete(public_path($data->image));
                }
                $data->update([
                    'image' => '',
                ]);
            }
        }

        if($data->title!=request('title')){
            if(Coupon::where('title', 'LIKE', request('title'))->count() > 0) {
                return redirect()->route('coupon')
                    ->with('message', "Not Updated. Coupon with this name already exists.");
            }
        }

        if($data->code!=request('code')){
            if(Coupon::where('code', 'LIKE', request('code'))->count() > 0) {
                return redirect()->route('coupon')
                    ->with('message', "Not Updated. Coupon Code already exists.");
            }
        }

        $data->update([
            'title' => request('title'),
            'code' => request('code'),
            'desc' => request('desc'),
            'perc_or_amount' => request('perc_or_amount'),
            'coupon_value' => request('coupon_value'),
            'validity' => request('validity'),
            'status' => $approved,
            'shop_id' => Session::get('Shop_ID'),
        ]);


        return redirect()->route('coupon')
            ->with('message', "Coupon Updated Successfully");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon,$couponId)
    {
        $id = decrypt($couponId);
        $paId = Coupon::where('id', $id);
        $paId->delete();
        return redirect()->route('coupon')
            ->with('message', "Coupon Removed Successfully");
    }
}
