<?php

namespace App\Http\Controllers\Si;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiController extends Controller
{
    //
    public function index(){
        return view('si.index');
    }
}
