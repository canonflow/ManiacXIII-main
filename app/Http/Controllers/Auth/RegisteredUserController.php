<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;  

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            //sekolah
            'username' => ['required', 'string','min:8' ,'max:255', 'unique' .User::class],
            'password' => ['required'],
            'nama_tim' => ['required', 'string', 'max:255', 'unique:teams,name'],
            'nama_sekolah' => ['required', 'string', 'max:255'],
            'alamat_sekolah' => ['required', 'string', 'max:255'],
            'nomor_sekolah' => ['required', 'string', 'max:255'],

            //leader
            'nama_leader' => ['required', 'string', 'max:255'],
            'email_leader' => ['required', 'email', 'lowercase', 'max:255', 'unique:participants,email'],
            'nomor_leader' => ['required', 'string', 'max:255', 'unique:participants,phone_number'],
            'foto_leader' => ['required','file','max:10240', 'mimes:jpg,jpeg,png'],

            //anggota1
            'nama_anggota1' => ['required', 'string', 'max:255'],
            'email_anggota1' => ['required', 'email', 'lowercase', 'max:255', 'unique:participants,email'],
            'nomor_anggota1' => ['required', 'string', 'max:255', 'unique:participants,phone_number'],
            'foto_anggota1' => ['required','file','max:10240', 'mimes:jpg,jpeg,png'],
             
            //anggota2
            'nama_anggota2' => ['required', 'string', 'max:255'],
            'email_anggota2' => ['required', 'email', 'lowercase', 'max:255', 'unique:participants,email'],
            'nomor_anggota2' => ['required', 'string', 'max:255', 'unique:participants,phone_number'],
            'foto_anggota2' => ['required','file','max:10240', 'mimes:jpg,jpeg,png'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
