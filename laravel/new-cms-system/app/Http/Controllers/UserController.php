<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
    }

    public function show(User $user)
    {
        return view('admin.users.profile', [
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    public function update(User $user)
    {
        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'avatar' => ['file'],
        ]);

        if (request('avatar')) {
            $inputs['avatar'] = request('avatar')->store('images');
        }

        $user->update($inputs);

        return back();
    }

    public function attach(User $user)
    {
        $user->roles()->attach(request('role'));

        return back();
    }

    public function detach(User $user)
    {
        $user->roles()->detach(request('role'));

        return back();
    }

    public function destroy(User $user)
    {
        //$this->authorize('delete', $user);

        $user->delete();

        session()->flash('user-deleted', 'User has been deleted!');

        return back();
    }
}
