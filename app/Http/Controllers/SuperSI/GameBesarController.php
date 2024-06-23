<?php

namespace App\Http\Controllers\SuperSI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GameBesarController extends Controller
{
    public function index()
    {
        return view('supersi.gamebesar.index');
//        return view('visitor.welcome');
    }
}
