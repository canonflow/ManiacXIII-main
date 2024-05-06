<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Acara;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function store(Request $request) {
        //dd($request);
        $request->validate([
            'role' => ['required'],
            'username' => ['required', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
            'name' => ['required']
        ]);

        // Biarin gini, Table Penpos blm ada soalnya
        $roles = ['acara', 'admin', 'penpos'];
        if (!in_array($request->get('role'), $roles)) abort(404);
//        if ($request->get('role') != 'admin') abort(404);

        // Buat User
        $user = User::create([
            'username' => $request->get('username'),
            'role' => $request->get('role'),
            'password' => Hash::make($request->get('password'))
        ]);

        // Check Role
        switch ($request->get('role')) {
            case 'admin':
                Admin::create([
                    'name' => $request->get('name'),
                    'user_id' => $user->id
                ]);
                break;
            case 'acara':
                Acara::create([
                    'name' => $request->get('name'),
                    'user_id' => $user->id
                ]);
                break;
        }

        return redirect()->back()->with('addSuccess', $user->username);
    }

    public function destroy(Request $request) {
        $user = User::where('username', $request->get('username'))->first();
        $username = $user->username;
        $user->delete();

        return redirect()->back()->with('deleteSuccess', $username);
    }
}
