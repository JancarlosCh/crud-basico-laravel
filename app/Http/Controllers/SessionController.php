<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($request->only(['email', 'password']))) {
            Session::flash('wrongCredentials', 'Credenciales incorrectas.');
            return redirect()->route('auth.login.index');
        }

        return redirect()->route('home');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('auth.login.index');
    }
}
