<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;

use function PHPUnit\Framework\isNull;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('users.create', [
            "roles" => $roles,
            "permissions" => $permissions
        ]);
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'unique:users'],
            "email" => ['required', 'unique:users', 'email'],
            "password" => ['required', 'same:confirm-password'],
            "confirm-password" => ['required']
        ]);


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $result = $user->save();

        if ($result) {
            $user->syncRoles($request->roles);
            $user->syncPermissions($request->permissions);
            return redirect('users');
        } else {
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $permissions = Permission::all();
        return view('users.edit', [
            'user' => $user,
            "roles" => $roles,
            "permissions" => $permissions
        ]);
    }


    public function update(Request $request, $id)
    {

       $request->validate([
            'name' => ['required', ],
            "email" => ['required', 'email'],
        ]);


        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;

        if (isset($request->password)) {

            $request->validate([
                'password' => ['required',],
                "password-confirm" => ['required', 'same:password'],
            ]);

            $user->password = bcrypt($request->password);
        }

        $result = $user->save();
        if ($result) {
            if (!isset($request->roles)) {
                $user->detachRoles(Role::all());
            } else {
                $user->syncRoles($request->roles);
            }
            if (!isset($request->permissions)) {
                $user->detachPermissions(Permission::all());
            } else {
                $user->syncPermissions($request->permissions);
            }


            return redirect('users')->with('message', $result);
        } else {
        }
    }
}
