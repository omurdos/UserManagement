<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', [
            'roles' => $roles
        ]);
    }


    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', [
            "permissions" => $permissions
        ]);
    }

    public function store(Request $request)
    {
        $role = Role::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description
        ]);
        $role->syncPermissions($request->permissions);
        return redirect('roles');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        return view('roles.edit', [
            "role" => $role,
            "permissions" => $permissions

        ]);
    }


    public function update(Request $request, $id)
    {
        $role =  Role::find($id);
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();
        $role->syncPermissions($request->permissions);
        return redirect('roles');
    }

}
