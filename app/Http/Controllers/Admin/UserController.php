<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Flash;

class UserController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }

    public function fetchUsers()
    {
        $users = User::with('company')->get();
        return $users;
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|max:255',
            'email' => 'required|email|max:255'
        ]);

        $user = New User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt(\Passworder::gen());
        $user->save();

        Flash::success($user->name. ' has been created.');
        return redirect('/admin');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'name'  => 'required|max:255',
            'email' => 'required|unique:users,email,'.$user->id
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        Flash::info($user->name. ' has been updated.');
        return redirect('/admin');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        Flash::info($user->name. ' has been deleted.');
        return redirect('/admin');
    }
}
