<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function index() {

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create() {
        return view('admin.users.create');
    }

    public function store(Request $request, User $user) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'confirmed|required',
            'password_confirmation' => 'required',
            'status' => 'required'
        ]);

        $inputs = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'status' => $request->input('status'),
        ];

        $user->create($inputs);

        return redirect('admin/users');
    }

    public function edit(User $user) {

        return view('admin.users.profile', compact('user'));
    }

    public function update(Request $request, User $user) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'confirmed|required',
            'password_confirmation' => 'required',
            'status' => 'required'
        ]);

        $inputs = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'status' => $request->input('status'),
        ];

        $user->update($inputs);

        return back();
    }

    public function destroy(User $user) {
        $user->delete();

        return redirect('admin/users');
    }
}
