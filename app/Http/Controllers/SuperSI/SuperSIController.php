<?php

namespace App\Http\Controllers\SuperSI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperSIController extends Controller
{
    public function index()
    {
        return view('supersi.dashboard.index');
    }
}
