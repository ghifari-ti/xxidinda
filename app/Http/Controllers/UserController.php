<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        if($request->has('password'))
        {
            $user->password = Hash::make($request->password);
        }
        $user->is_admin = $request->is_admin;
        $user->save();
        return redirect()->back()->with(['success' => 'User updated successfuly.']);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/allUser')->with(['success' => 'User updated successfuly.']);
    }
}
