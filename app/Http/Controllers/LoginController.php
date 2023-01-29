<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public function login(Request $request)
    {
        //make validation
        $validatedData = $this->validate($request, [
            'email' => 'required|email:dns',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', 'Login successfull!');
        }

        return back()->with([
            'error' => 'Login gagal!',
        ]);
    }
}
