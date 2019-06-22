<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function index() {
        if (Auth::check()) {
            return redirect()->route('adm.index');
        }
        return view('home');
    }
    
    public function logout() {
        if(Auth::check()){
            Auth::logout();
            return redirect('home');
        }
        return back()->withInput();
    }   
}
