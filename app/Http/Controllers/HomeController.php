<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offers::latest()->paginate(10);
        return view('home', compact('offers'));
    }
}
