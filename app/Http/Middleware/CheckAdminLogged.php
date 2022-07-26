<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use Session;
use Illuminate\Support\Facades\Route;

class CheckAdminLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $route = Route::getRoutes()->match($request);
        $route_name = $route->getName();
        $admin_access=Session::get('Admin_Access');




        $route_fragmented = explode(".", $route_name);

        $allow=1;
        if(($route_fragmented[0]!='login')&&($admin_access!='yes')) {
            $allow = $this->role_control($route_name);
        }

        if($allow==1){
                return $next($request);
        }
        else{
            return redirect("/");
        }
    }

    public static function role_control($route_name){
        $role_id=Session::get('Role_ID');
        $admin_access=Session::get('Admin_Access');
        $allow=0;

        if($admin_access=='yes'){
            $allow=1;
            return $allow;
        }

        $dashboard=$machine=$workingdays=$coupon=$feature=$servicerecord=$package=$packagerecord=$loyaltypoint=$notification=$customer=$customervehicle=$message=$report=array();
        $permission_data=Session::get('role_data');

        foreach ($permission_data as $key => $value)
        {
            if($key=="'dashboard'"){$dashboard=$value;}
            if($key=="'machine'"){$machine=$value;}
            if($key=="'workingdays'"){$workingdays=$value;}
            if($key=="'coupon'"){$coupon=$value;}
            if($key=="'feature'"){$feature=$value;}
            if($key=="'servicerecord'"){$servicerecord=$value;}
            if($key=="'package'"){$package=$value;}
            if($key=="'packagerecord'"){$packagerecord=$value;}
            if($key=="'loyaltypoint'"){$loyaltypoint=$value;}
            if($key=="'notification'"){$notification=$value;}
            if($key=="'customer'"){$customer=$value;}
            if($key=="'customervehicle'"){$customervehicle=$value;}
            if($key=="'message'"){$message=$value;}
            if($key=="'report'"){$report=$value;}
        }

        $route_fragmented = explode(".", $route_name);
        if(!isset($route_fragmented[1])){array_push($route_fragmented,'index');}
        if(in_array($route_fragmented[1],${$route_fragmented[0]})) {$allow=1;}
        return $allow;
    }
}
