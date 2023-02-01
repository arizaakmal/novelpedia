<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SignUpController extends Controller
{
    //
    public function store(Request $request)
    {
        //validate the data
        $validatedData = $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6'
        ]);

        //hash the password
        // $validatedData['password'] = bcrypt($validatedData['password']);


        //store in the database
        User::create($validatedData);



        return redirect('/login')->with('success', 'Registration successfull! Please login');


        //tampilkan pesan sukses


        //pergi ke login page

    }
}
