<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\mail_send;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Hash;
use Mail;



class UserControllerApi extends Controller
{

    public function viewProfile(Request $request)
    {
        $request->validate([
            'access_token' => 'required',
            'email' => 'required',
        ]);

        $user = User::where('email',request('email'))->where('access_token',request('access_token'))->get();

        if(count($user)==1)
        {
            return response()->json([
                'status' => true,
                'userProfile' => $user,
                'message' => 'User Profile successful',
            ]);
        }
        else
        {
            return response()->json([
                'status' => false,
                'userProfile' => '',
                'message' => 'No user exists error',
            ]);
        }
    }


    public function profileUpdate(Request $request)
    {
        $request->validate([
            'access_token' => 'required',
            'email' => 'required',
        ]);

        $user = User::where('email',request('email'))->where('access_token',request('access_token'))->get();

        if(count($user)==1)
        {
         if(request('name')!='Admin') {
             $user[0]->update([
                 'name' => request('name'),
             ]);
         }

            $user_res = User::where('email',request('email'))->where('access_token',request('access_token'))->get();


            return response()->json([
                'status' => true,
                'userProfile' => $user_res,
                'message' => 'User Profile Updated',
            ]);
        }
        else
        {
            return response()->json([
                'status' => false,
                'userProfile' => '',
                'message' => 'No user exists error',
            ]);
        }
    }




    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::firstWhere('email',request('email'));

        if($user){
            if (Hash::check(request('password'), $user->password)) {

                do {
                    $token_key = Str::random(5);
                } while (User::where("access_token", "=", $token_key)->first() instanceof User);

                $user->update([
                    'access_token' => $token_key,
                ]);

                return response()->json([
                    'status' => true,
                    'message' => 'login successful',
                    'access_token' => $token_key,
                ]);
            }
            else
            {
                return response()->json([
                    'status' => false,
                    'message' => 'login failed',
                ]);
            }
        }
        return response()->json([
            'status' => false,
            'message' => 'login failed',
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (User::where('email', request('email'))->exists()) {
            return response()->json([
                'status' => false,
                'message' => 'Email already exist',
            ]);
        }

        $otp= rand(0000,9999);

        $mto=request('email');
        $details=$request;
        $mto=request('email');
        Mail::to($mto)->send(new mail_send($details));

        $data = new User;
        $data->email = request('email');
        $data->complete_status = 0;
        $data->otp = $otp;
        $data->password  = Hash::make(request('password'));
        $data->save();


        return response()->json([
            'status' => true,
            'message' => 'OTP for User registration sent',
        ]);
    }


    public function otp_register_complete(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'otp' => 'required',
        ]);

        $user = User::where('email',request('email'))->where('otp',request('otp'))->get();

        if(count($user)==1)
        {
            $user[0]->update([
                'complete_status' => 1,
            ]);
        }


        return response()->json([
            'status' => true,
            'message' => 'User registered with OTP',
        ]);
    }



}
