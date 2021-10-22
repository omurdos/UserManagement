<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        Log::create(
            [
                'message' => "List of roles viewed by ".Auth::user()->name
            ]
        );
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

        
       $request->validate([
        'name' => ['required', ],
        "display_name" => ['required'],
    ]);


        $role = Role::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description
        ]);
        $result = $role->syncPermissions($request->permissions);
        
        Log::create(
            [
                'message' => "User ".Auth::user()->name." created ".$role->name
            ]
        );
        return redirect('roles')->with('message', $result);
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

        $request->validate([
            'name' => ['required', ],
            "display_name" => ['required'],
        ]);
    

        $role =  Role::find($id);
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $result = $role->save();
        if(!isset($request->permissions)){
            $result = $role->detachPermissions(Permission::all());
        }else{
           $result = $role->syncPermissions($request->permissions);
        }
        Log::create(
            [
                'message' => "User ".Auth::user()->name." updated ".$role->name
            ]
        );
        return redirect('roles')->with('message', $result);
    }

}
