<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UseController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
}
