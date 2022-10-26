<?php

namespace App\Http\Controllers;

use App\Models\LoyaltyPoint;
use Illuminate\Http\Request;
use Session;

class LoyaltyPointController extends Controller
{

    public function index()
    {
        $shop_id=Session::get('Shop_ID');
        $loyalties =LoyaltyPoint::where('shop_id','=',$shop_id)->get();
        return view('content.loyaltypoint.index', compact('loyalties'));
    }


    public function create()
    {
        $shop_id=Session::get('Shop_ID');
        $loyalties =LoyaltyPoint::where('shop_id','=',$shop_id)->get();
        if(count($loyalties)==0)
        {
            return view('content.loyaltypoint.create');
        }
        else
        {
            return view('content.loyaltypoint.index', compact('loyalties'));
        }

    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'money' => 'required',
            'points' => 'required',
            'minimum_points_redeem' => 'required',
            'status' => 'required',
        ]);

        $data = new LoyaltyPoint();
        $data->shop_id =Session::get('Shop_ID');
        $data->money = request('money');
        $data->points = request('points');
        $data->minimum_points_redeem = request('minimum_points_redeem');
        $data->status = request('status');

        $data->save();

        return 1;
//        return redirect()->route('loyaltypoint.create')
//            ->with('message', "Loyalty point reward Saved Successfully");
    }

    public function show(LoyaltyPoint $loyalty)
    {
        //
    }


    public function edit(LoyaltyPoint $loyalty, $loyaltypointId)
    {
        $id = decrypt($loyaltypointId);
        $loyalty = LoyaltyPoint::find($id);
        return view('content.loyaltypoint.edit', compact('loyalty'));
    }

    public function update(Request $request, LoyaltyPoint $loyalty)
    {
        $validated = $request->validate([
            'money' => 'required',
            'points' => 'required',
            'minimum_points_redeem' => 'required',
            'status' => 'required',
        ]);

        $id = decrypt(request('loyaltyid'));
        $data = LoyaltyPoint::find($id);

        $data->update([
            'money' => request('money'),
            'points' => request('points'),
            'minimum_points_redeem' => request('minimum_points_redeem'),
            'status' => request('status'),
            'shop_id' => Session::get('Shop_ID'),
        ]);

        return 1;
//        return redirect()->route('loyaltypoint')
//            ->with('message', "Loyalty point reward Updated Successfully");
    }

    public function destroy(LoyaltyPoint $loyalty,$loyaltypointId)
    {
        $id = decrypt($loyaltypointId);
        $paId = LoyaltyPoint::where('id', $id);
        $paId->delete();
        return 1;
//        return redirect()->route('loyaltypoint')
//            ->with('message', "Loyalty point reward Removed Successfully");
    }
}
