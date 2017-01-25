<?php

namespace App\Http\Controllers\admin;

use Gate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Route;
use Response;

class UsersController extends Controller {
    public function index() {

        $users = User::paginate(15);

        if (Route::getCurrentRoute()->getPrefix() == '/api/v1') {
            return $users;
        } else {
            return view('admin.users.index', compact('users'));
        }
    }

    public function show($user) {
        $user = User::find($user);
        if (!$user) {
            return Response::json([
                'error' => [
                    'message' => "User does not exist"
                ]
            ], 404);
        } else {
            return $user;
        }
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

        session()->flash('confirm', 'User has been <b>added</b>.');

        return redirect('admin/users');
    }

    public function edit(User $user) {
        if (str_contains(url()->current(), 'profile')) {
            $user = Auth::user();
        }
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'confirmed',
            'password_confirmation' => '',
            'privileges' => 'required'
        ]);

        $inputs = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'privileges' => $request->input('privileges'),
        ];

        if (str_contains(url()->current(), 'profile')) {
            $user = Auth::user();
        }

        $user->update($inputs);

        session()->flash('confirm', 'User has been <b>updated</b>.');

        return back();
    }

    public function destroy(User $user) {
        $user->delete();

        session()->flash('confirm-delete', 'User has been <b>deleted</b>.');

        return redirect('admin/users');
    }
}
