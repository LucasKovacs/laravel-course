<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$request->session()->put(['edwin' => 'master instructor']);

        //session(['peter' => 'student']);

        //return $request->session()->get('edwin');
        //return $request->session()->all();

        //return view('home');

        //session(['edwin2' => 'your teacher']);

        //$request->session()->forget('edwin2');
        //$request->session()->flush();

        //return session('edwin2');
        //return $request->session()->all();

        //$request->session()->flash('message', 'Post has been created');
        //return $request->session()->get('message');

        //$request->session()->reflash();

        //$request->session()->keep(['message', 'other message']);
    }
}
