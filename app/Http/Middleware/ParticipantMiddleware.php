<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ParticipantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->role == 'participant') {
//            if (Auth::user()->team->status == 'verified') return $next($request);
//            // Biar bisa make POST untuk upload bukti Transfer
//            else if (Auth::user()->team->status == 'waiting' && $request->get("_token") != null) return $next($request);
//
//            // Sementara view nya pake welcome dlu (Belum dibuat)
//            else if (Auth::user()->team->status == 'waiting') return \response()->view('welcome');
//            else if (Auth::user()->team->status == 'unverified') return \response()->view('welcome');
//            else if (Auth::user()->team->status == 'deactivated') return \response()->view('welcome');
            return $next($request);
        }

        abort(404);
    }
}
