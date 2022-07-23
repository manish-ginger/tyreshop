<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\Shop;
use App\Models\Banner;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use App\Models\WashingType;

use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{

    public function index()
    {
        // return view('auth.login');
        return view('livewire.login')
        ->layout('layouts.custom-app');
    }

    public function reset()
    {

        if(Auth::check()){
            return view('content.reset.index');
        }

        return redirect("/")->withSuccess('are not allowed to access');
    }

    public function resetadmin(Request $request)
    {
        if(Auth::check()){
        $user = Auth::user();

        $request->request->add(['email' => $user->email]); //add request

        $request->validate([
            'password' => 'required',
            'new_pw' => 'required',
        ]);


        if($request->password==$request->new_pw)
        {
            session()->flash('message','No change in new password.Password remains same!');
            return redirect()->back()->withSuccess('No change in password!');
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user->password = Hash::make($request->new_pw);
            $user->save();
            session()->flash('message','Admin Password Reset Successful. Sign again!');
            return redirect('/admin')->withSuccess('Reset Successful. Sign again as admin ! ');
        }
        session()->flash('message','Login details are not valid');
        return redirect()->back()->withSuccess('Login details are not valid');
    }
    return redirect("/")->withSuccess('are not allowed to access');
    }



    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $request->request->add(['name' => 'Admin']); //add request

        $credentials = $request->only('email', 'password', 'name');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/dashboard')
                        ->withSuccess('Signed in');
        }

        session()->flash('message','Login details are not valid');
        return redirect()->back()->withSuccess('Login details are not valid');
    }

    public function dashboard()
    {
        if(Auth::check()){
            $vehicleCount = Vehicle::count();
            $bannerCount = Banner::count();
            $vehicleCategoryCount = VehicleCategory::count();
            $shopCount = Shop::count();
            $washingTypeCount = WashingType::count();

            return view('content.dashboard.index',compact('vehicleCount','bannerCount','vehicleCategoryCount','shopCount','washingTypeCount'));
        }
        return redirect("/")->withSuccess('are not allowed to access');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('/admin');
    }
}
