<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use App\Models\Participant;
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
        // dd($request->all());
        $request->validate([
            //sekolah
            'username' => ['required', 'string','min:8' ,'max:25', 'unique:users,username'],
            'password' => ['required'],
            'nama_tim' => ['required', 'string', 'max:25', 'unique:teams,name'],
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

        // ===== Create User =====
        $user = User::create([
            'username' => $request->get('username'),
            'password' => Hash::make($request->get('password')),
            'role' => 'participant'
        ]);

        // ===== Create Teams =====
        $team = Team::create([
            'user_id' => $user->id,
            'name' => $request->get('nama_tim'),
            'school_name' => $request->get('nama_sekolah'),
            'school_address' => $request->get('alamat_sekolah'),
            'school_number' => $request->get('nomor_sekolah'),
            'status' => 'waiting',
        ]);

        // ===== Create Participants =====
        // storage/app/public/{namaTim}/foto/{leader,member}
        // Ketua
        $fotoKetua = 'leader.' . $request->file('foto_leader')->getClientOriginalExtension();
        $request->file('foto_leader')
                ->storeAs(
                  $team->name . '/foto',
                  $fotoKetua,
                  'public'
                );
        $ketua = Participant::create([
            'team_id' => $team->id,
            'email' => $request->get('email_leader'),
            'position' => 'leader',
            'name' => $request->get('nama_leader'),
            'phone_number' => $request->get('nomor_leader'),
            'student_photo' => $team->name . '/foto/' . $fotoKetua,
            'alergi' => $request->get("alergi_leader"),
        ]);

        // Anggota 1
        $fotoAnggota1 = 'anggota1.' . $request->file('foto_anggota1')->getClientOriginalExtension();
        $request->file('foto_anggota1')
            ->storeAs(
                $team->name . '/foto',
                $fotoAnggota1,
                'public'
            );
        $anggota1 = Participant::create([
            'team_id' => $team->id,
            'email' => $request->get('email_anggota1'),
            'position' => 'member',
            'name' => $request->get('nama_anggota1'),
            'phone_number' => $request->get('nomor_anggota1'),
            'student_photo' => $team->name . '/foto/' . $fotoAnggota1,
            'alergi' => $request->get('alergi_anggota1')
        ]);

        // Anggota 2
        $fotoAnggota2 = 'anggota2.' . $request->file('foto_anggota2')->getClientOriginalExtension();
        $request->file('foto_anggota2')
            ->storeAs(
                $team->name . '/foto',
                $fotoAnggota2,
                'public'
            );
        $anggota2 = Participant::create([
            'team_id' => $team->id,
            'email' => $request->get('email_anggota2'),
            'position' => 'member',
            'name' => $request->get('nama_anggota2'),
            'phone_number' => $request->get('nomor_anggota2'),
            'student_photo' => $team->name . '/foto/' . $fotoAnggota2,
            'alergi' => $request->get('alergi_anggota2')
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/team');
    }
}
