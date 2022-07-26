<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Packageimg;
use App\Models\Packagerecord;
use App\Models\User;
use Illuminate\Http\Request;
use DateTime;
use Carbon\Carbon;


class PackageControllerApi extends Controller
{

    public function list(Request $request)
    {
        $request->validate([
            'access_token' => 'required',
            'email' => 'required',
        ]);

        $user = User::where('email',request('email'))->where('access_token',request('access_token'))->get();


        if(count($user)==1) {

            $packages = Package::latest()->get();
            $packimages = Packageimg::latest()->get();

            return response()->json([
                'status' => true,
                'packages' => $packages,
                'packimages' => $packimages,
            ]);
        }
        else
        {
            return response()->json([
                'status' => false,
                'message' => 'No access',
            ]);
        }

    }

    public function userpackagelist(Request $request)
    {
        $request->validate([
            'access_token' => 'required',
            'email' => 'required',
            'shop_id' => 'required',
        ]);

        $user = User::where('email',request('email'))->where('access_token',request('access_token'))->get();


        if(count($user)==1) {

            $user_packages = Packagerecord::where('customer_id',$user[0]->id)->where('shop_id',request('shop_id'))->get();

            return response()->json([
                'status' => true,
                'user_packages' => $user_packages,
            ]);
        }
        else
        {
            return response()->json([
                'status' => false,
                'message' => 'No access',
            ]);
        }

    }


    public function userpackagelistActive(Request $request)
    {
        $request->validate([
            'access_token' => 'required',
            'email' => 'required',
            'shop_id' => 'required',
        ]);

        $user = User::where('email',request('email'))->where('access_token',request('access_token'))->get();


        if(count($user)==1) {

            $user_packages = Packagerecord::where('customer_id',$user[0]->id)->where('shop_id',request('shop_id'))->get();

            foreach ($user_packages as $package)
            {
                $package_res['record']=$package;
                $package_purchase_date=$package->created_at;

                $package_detail = Package::where('id',$package->package_id)->where('shop_id',$package->shop_id)->get();

                if(count($package_detail)==1)
                {
                    $package_validity=$package_detail[0]->validity;
                    $package_res['package_details']=$package_detail;

                    $currentDateTime = Carbon::now();
                    $package_validity_date = $package_purchase_date->addDays($package_validity);


                    if ($currentDateTime > $package_validity_date)
                    {
                        $package_res['active']='Not Active';
                    }
                    else
                    {
                        $package_res['active']='Active';
                    }

                }
            }

            return response()->json([
                'status' => true,
                'user_packages' => $package_res,
            ]);
        }
        else
        {
            return response()->json([
                'status' => false,
                'message' => 'No access',
            ]);
        }

    }



}
