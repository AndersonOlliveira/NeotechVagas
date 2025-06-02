<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class routesControllers extends Controller
{
    public function index()
    {
        return view('pages.listar');

    }

     public function Homes()
    {
        return view('pages.home');

    }
    
}
