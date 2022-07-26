<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Feature;
use App\Models\Machines;
use App\Models\Role;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Hash,Session;
use App\Models\Package;
use App\Models\Banner;
use App\Models\Shop;
use App\Models\Loyalty;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{

    public function index()
    {
        return view('livewire.login')
        ->layout('layouts.custom-app');
    }

//    public function signUp()
//    {
//        return view('livewire.signup')
//        ->layout('layouts.custom-app');
//    }

    public function reset()
    {
        return view('content.reset.index');
    }

    public function resetadmin(Request $request)
    {
        $shop_email=Session::get('Shop_Email');
        $shop = Shop::firstWhere('email',$shop_email);
        $user = User::firstWhere('email',$shop_email);

        $request->request->add(['email' => $shop_email]);

        $request->validate([
            'password' => 'required',
            'new_pw' => 'required',
        ]);

        if($shop){
        if (Hash::check(request('password'), $shop->password)) {
            if($request->password==$request->new_pw)
            {
                session()->flash('message','No change in new password.Password remains same!');
                return redirect()->back()->withSuccess('No change in password!');
            }
            $shop->password = Hash::make($request->new_pw);
            $shop->save();
            session()->flash('message','Shop Password Reset Successful. Sign again!');
            return redirect('/admin')->withSuccess('Reset Successful. Sign again as admin ! ');
        }
        else
        {
            session()->flash('message','Current password is not valid');
            return redirect()->back();
        }
    }elseif($user){
            if (Hash::check(request('password'), $user->password)) {
                if($request->password==$request->new_pw)
                {
                    session()->flash('message','No change in new password.Password remains same!');
                    return redirect()->back()->withSuccess('No change in password!');
                }
                $user->password = Hash::make($request->new_pw);
                $user->save();
                session()->flash('message','User Password Reset Successful. Sign again!');
                return redirect('/admin')->withSuccess('Reset Successful. Sign again as user ! ');
            }
            else
            {
                session()->flash('message','Current password is not valid');
                return redirect()->back();
            }
        }
        else {
            return redirect()->back()->withSuccess('Login details are not valid');
        }
    }



    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $shop = Shop::firstWhere('email',request('email'));
        $user = User::firstWhere('email',request('email'));

        if($shop){
                if ($shop->approved == 0) {
                    session()->flash('message', 'Your shop is not approved yet!');
                    return redirect()->back()->withSuccess('Your shop is not approved yet!');
                }

            if ($shop->approved == 1) {
                if (Hash::check(request('password'), $shop->password)) {
                    Session::put('Admin_Access', 'yes');
                    Session::put('Shop_Email', $shop->email);
                    Session::put('Shop_ID', $shop->id);
                    return redirect()->intended('admin/dashboard')
                        ->withSuccess('Signed in');
                } else {
                    session()->flash('message', 'Login details are not valid');
                    return redirect()->back()->withSuccess('Login details are not valid');
                }
            }
    }
        elseif(($user)&&($user->name!='Admin')) {
            $shop = Shop::firstWhere('id', $user->shop_id);
            if($shop) {
            if ($shop->approved == 0) {
                session()->flash('message', 'Your shop is not approved yet!');
                return redirect()->back()->withSuccess('Your shop is not approved yet!');
            }

            if ($shop->approved == 1) {
                if (Hash::check(request('password'), $user->password)) {
                    Session::put('Admin_Access', 'no');
                    Session::put('Shop_Email', $user->email);
                    Session::put('Shop_ID', $user->shop_id);
                    Session::put('Role_ID', $user->role_id);
                    $role_data =Role::where('id','=',$user->role_id)->get();
                    $permission_data=json_decode($role_data[0]->permission);
                    Session::put('role_data', $permission_data);
                    return redirect()->intended('admin/dashboard')
                        ->withSuccess('Signed in');
                } else {
                    session()->flash('message', 'Login details are not valid');
                    return redirect()->back()->withSuccess('Login details are not valid');
                }
            }
        }
        }
        else {
            session()->flash('message', 'Login details are not valid');
            return redirect()->back()->withSuccess('Login details are not valid');
        }
    }


    public function signupJoin(Request $request, Shop $shop)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Shop::where('email', request('email'))->exists()) {
            session()->flash('message','Shop with this email already exist! Please try with different email');
            return redirect()->back();
        }


        $data = new Shop;
        $data->email = request('email');
        $data->password  = Hash::make(request('password'));
        $data->approved = 'no';

        $data->save();

        session()->flash('message','Thank you for submitting your shop!You can login after after approval!');
        return Redirect('/admin');
    }




    public function dashboard()
    {
            $machineCount = Machines::count();
            $vehicleCount = Vehicle::count();
            $customerCount = Customer::count();
            $featureCount = Feature::count();
            $packageCount = Package::count();
            $loyaltyCount = Loyalty::count();
            return view('content.dashboard.index',compact('machineCount','vehicleCount','customerCount','featureCount','packageCount','loyaltyCount'));
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('/admin');
    }
}
