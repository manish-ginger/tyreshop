<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Shop;
use Illuminate\Http\Request;
use File;
use Hash;

class UserController extends Controller
{


    public function index()
    {
        $users = User::latest()->get();
        return view('content.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::latest()->get();
        $shops = Shop::latest()->get();
        return view('content.user.create',compact('roles','shops'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'shop_id' => 'required',
            'role_id' => 'required',
        ]);

        if(User::where('name', 'LIKE', request('name'))->count() > 0) {
            return redirect()->route('user.create')
                ->with('message', "Not Added. User with this name already exists.");
        }

        if(User::where('email', 'LIKE', request('email'))->count() > 0) {
            return redirect()->route('user.create')
                ->with('message', "Not Added. User with this email already exists.");
        }


        $data = new User;
        $data->name = request('name');
        $data->email = request('email');
        $data->password  = Hash::make(request('password'));
        $data->role_id = request('role_id');
        $data->shop_id = request('shop_id');


        $data->save();


        return redirect()->route('user.create')
            ->with('message', "User Saved Successfully");
    }

    public function show(User $user,$userId)
    {
        $id = decrypt($userId);
        $user = User::find($id);
        return view('content.user.show', compact('user'));
    }

    public function edit(User $user,$userId)
    {
        $id = decrypt($userId);
        $user = User::find($id);
        $roles = Role::latest()->get();
        $shops = Shop::latest()->get();
        return view('content.user.edit', compact('user','roles','shops'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role_id' => 'required',
            'shop_id' => 'required',
        ]);

        $id = decrypt(request('userid'));
        $user = User::find($id);

        if ($user->name != request('name')){
            if (User::where('name', 'LIKE', request('name'))->count() > 0) {
                return redirect()->route('user.create')
                    ->with('message', "Not Added. User with this name already exists.");
            }
        }

        if ($user->email != request('email')){
            if (User::where('email', 'LIKE', request('email'))->count() > 0) {
                return redirect()->route('user.create')
                    ->with('message', "Not Added. User with this email already exists.");
            }
        }

        $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'role_id' => request('role_id'),
            'shop_id' => request('shop_id'),
        ]);

        if(!request('password')==null)
        {
            $user->update([
                'password' => Hash::make(request('password')),
            ]);
        }

        return redirect()->route('user')
            ->with('message', "User Updated Successfully");
    }

    public function destroy(User $user,$userId)
    {
        $id = decrypt($userId);
        $paId = User::where('id', $id);
        $paId->delete();
        return redirect()->route('user')
            ->with('message', "User Removed Successfully");
    }
}
