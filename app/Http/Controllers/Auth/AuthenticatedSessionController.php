<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        //print_r($request->all());
        try {
            $request->validate([
                'username' => ['required', 'string', 'min:1', 'max:15'],
                'password' => ['required', 'string', 'min:8']
            ]);
            $request->authenticate();

            $request->session()->regenerate();

//            $this->authenticated($request, Auth::user());

            switch (Auth::user()->role) {
                case 'participant':
                    return redirect()->intended('/team');
                    break;
                case 'acara':
                    return redirect()->intended('/acara');
                case 'admin':
                    return redirect()->intended('/admin');
                case 'penpos':
                    return redirect()->intended('/penpos');
                case 'si':
                    return redirect()->intended('/si');
                case 'supersi':
                    return redirect()->intended('/super-si');
            }

            abort(404);
        } catch (ValidationException $ex) {
//            dd($ex->getMessage());
            return redirect()->back()->with('gagal', $ex->getMessage());
        }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    // Untuk login cuma bisa 1 user
    protected function authenticated(Request $request, $user)
    {
        Auth::logoutOtherDevices($request['password']);
    }
}
