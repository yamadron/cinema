<?php

namespace App\Http\Controllers\admin;

use Gate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function index() {

        $users = User::paginate(15);

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
            'privileges' => 'required'
        ]);

        $inputs = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'privileges' => $request->input('privileges'),
        ];

        $user->create($inputs);

        return redirect('admin/users');
    }

    public function edit(User $user) {

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'confirmed|required',
            'password_confirmation' => 'required',
            'privileges' => 'required'
        ]);

        $inputs = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'privileges' => $request->input('privileges'),
        ];

        $user->update($inputs);

        return back();
    }

    public function destroy(User $user) {
        $user->delete();

        return redirect('admin/users');
    }
}
