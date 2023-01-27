<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create()
    {
        //make login





        return redirect('/home')->with('success', 'Login successfull!');
    }
}
