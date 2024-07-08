<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return view('backend.auth.sign-up');
    }

    public function login()
    {
        return view('backend.auth.sign-in');
    }

    public function forget()
    {
        return view('backend.auth.forgot-password');
    }

    public function terms()
    {
        return view('backend.auth.terms-condition');
    }

    public function privacy()
    {
        return view('backend.auth.privacy-policy');
    }

    public function google()
    {
        return "Google APi";
    }

    public function facebook()
    {
        return "Facebook APi";
    }
    


}
