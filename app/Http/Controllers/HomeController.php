<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

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
        $city = null;
        if (Auth::check())
        {
            $user = \App\User::find(Auth::id());
            if ($user->cities()->exists())
            {
                $city = $user->cities->first();
            }
        }

        return view('home', ['city' => $city]);
    }
}
