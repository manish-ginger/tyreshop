<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Workingdays;
use Illuminate\Http\Request;

class WorkingdaysControllerApi extends Controller
{

    public function list(Request $request)
    {
        $request->validate([
            'access_token' => 'required',
            'email' => 'required',
            'shop_id' => 'required',
        ]);

        $user = User::where('email',request('email'))->where('access_token',request('access_token'))->get();


        if(count($user)==1) {

            $working_days = Workingdays::where('shop_id',request('shop_id'))->get();


            return response()->json([
                'status' => true,
                'working_days' => $working_days,
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
