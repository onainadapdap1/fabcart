<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class  RegisteredController extends Controller
{
    public function index() {
        $users = User::paginate(2);
        return view('admin.users.index')->with('users', $users);
    }
    public function edit($id) {
        $user_roles =  User::find($id);
        return view('admin.users.edit', compact('user_roles'));
    }
    public function updaterole(Request $request, $id) {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->role_as = $request->input('roles');
        $user->isban = $request->input('isban');
        $user->update();

        return redirect()->back()->with('status', 'Role is updated');
    }
}
