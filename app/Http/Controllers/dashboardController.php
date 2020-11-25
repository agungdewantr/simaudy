<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\jenispaket;

class dashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }


    public function tentangkami()
    {
      $jenispaket = \App\jenispaket::all();
      return view('tentangkami', compact('jenispaket'));
    }
}
