<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
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
        $email = Auth::user()->email;
        $password = Auth::user()->password;
        $users = DB::select("select * from users where email='$email' and password='$password'");
        foreach ($users as $user) {
            session()->put('username', $user->name);
            session()->put('id', $user->id);
            session()->put('flag', 1);
        }

  
        $warehouses = DB::select('select * from Warehouses');

        return view('home', ['warehouses' => $warehouses]);
    }
}
