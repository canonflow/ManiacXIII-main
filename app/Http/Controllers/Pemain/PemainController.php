<?php

namespace App\Http\Controllers\Pemain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemainController extends Controller
{
    public function index() {
        return view('pemain.dashboard');
    }
}
