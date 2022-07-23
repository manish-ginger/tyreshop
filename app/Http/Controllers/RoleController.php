<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use File;

class RoleController extends Controller
{


    public function index()
    {
        $roles = Role::latest()->get();
        return view('content.role.index', compact('roles'));
    }

    public function create()
    {
        return view('content.role.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'permission' => 'required',
        ]);

        if(Role::where('name', 'LIKE', request('name'))->count() > 0) {
            return redirect()->route('role.create')
                ->with('message', "Not Added. Role with this name already exists.");
        }


        $data = new Role;
        $data->name = request('name');
        $data->permission = json_encode(request('permission'));

        $data->save();


        return redirect()->route('role.create')
            ->with('message', "Role Saved Successfully");
    }

    public function show(Role $role,$roleId)
    {
        $id = decrypt($roleId);
        $role = Role::find($id);

        return view('content.role.show', compact('role'));
    }

    public function edit(Role $role,$roleId)
    {
        $id = decrypt($roleId);
        $role = Role::find($id);

        return view('content.role.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => 'required',
            'permission' => 'required',
        ]);

        $id = decrypt(request('roleid'));
        $role = Role::find($id);

        if ($role->name != request('name')){
            if (Role::where('name', 'LIKE', request('name'))->count() > 0) {
                return redirect()->route('role.create')
                    ->with('message', "Not Added. Role with this name already exists.");
            }
        }

        $role->update([
            'name' => request('name'),
            'permission' => json_encode(request('permission')),
        ]);


        return redirect()->route('role')
            ->with('message', "Role Updated Successfully");
    }

    public function destroy(Role $role,$roleId)
    {
        $id = decrypt($roleId);
        $paId = Role::where('id', $id);
        $paId->delete();
        return redirect()->route('role')
            ->with('message', "Role Removed Successfully");
    }
}
