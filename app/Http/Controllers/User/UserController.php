<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function user(){

       $users =  User::get();
        return view('backend.user.users', compact('users'));
    }
    public function addUser(){

        $users =  User::get();
         return view('backend.user.add-user');
     }
 

    
}
