<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        return view('users.create');
    }


    public function store(Request $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $result = $user->save();

        if ($result) {
            return redirect('laratrust');
        } else {
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', [
            'user' => $user
        ]);
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;

        if (isset($request->password)) {
            $user->password = bcrypt($request->password);
        }

        $result = $user->save();
        if ($result) {
            return redirect('users')->with('message', $result);
        } else {
        }
    }
}
