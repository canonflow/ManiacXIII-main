<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $superRole = ['supersi', 'si', 'participant'];
        $users = User::whereNotIn('role', $superRole)
                    ->orderBy('id', 'DESC')
                    ->paginate(10);
        //dd($users);
        return view('admin.users.index', compact('users'));
    }

    public function destroy(Request $request) {
        $user = User::where('username', $request->get('username'))->first();
        $username = $user->username;
        $user->delete();

        return redirect()->back()->with('deleteSuccess', $username);
    }
}
