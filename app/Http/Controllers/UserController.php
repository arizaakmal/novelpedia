<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $user = Auth::user();

        return view('profile', ['title' => 'User Profile', 'active' => 'profile', 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $user = Auth::user();

        return view('changePassword', ['title' => 'Change Password', 'active' => 'change-password', 'user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function loginSubmit(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        //validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        //attempt to login the user
        if (User::attempt(['email' => $email, 'password' => $password], $request->remember)) {
            //if successful, then redirect to their intended location
            return redirect()->intended(route('home'));
        }

        //if successful, redirect to intended page

        //if unsuccessful, redirect back to login page with errors
    }
}
