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
        $admin_access=Session::get('Admin_Access');
        $allow=0;

        if($admin_access=='yes'){return 1;}

        $permission_data=Session::get('role_data');
        $route_fragmented = explode(".", $route_name);
        ${$route_fragmented[0]}=array();
        if(!isset($route_fragmented[1])){array_push($route_fragmented,'index');}

        foreach ($permission_data as $key => $value)
        {
            $section_name = str_replace("'", "", $key);
            if($section_name==$route_fragmented[0]) {
                ${$section_name} = $value;
            }
        }

        if(in_array($route_fragmented[1],${$route_fragmented[0]})) {$allow=1;}
        return $allow;
    }
}
