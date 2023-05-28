<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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
        // $validatedData = $this->validate($request, [
        //     'currentPassword' => 'required',
        //     'newPassword' => 'required|confirmed|min:6'
        // ]);

        // // Get user
        // $user = Auth::user();

        // // Check if old password is correct
        // if (!Hash::check($validatedData['currentPassword'], $user->password)) {
        //     return back()->withErrors(['currentPassword' => 'Password lama salah']);
        // }

        // $user = User::find(auth()->user()->id);

        // // Update password
        // $user->password = Hash::make($validatedData['newPassword']);

        // // Save user
        // $user->save();

        // // Redirect with success message
        // return redirect()->back()->withSuccess('Password berhasil diubah');
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

    }

 
    public function changePassword(Request $request)
    {


        // Validate request
        $validatedData = $this->validate($request, [
            'currentPassword' => 'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ]);


        // Get user
        $user = Auth::user();

        // Check if old password is correct
        if (!Hash::check($validatedData['currentPassword'], $user->password)) {
            return back()->with(['error' => 'Password lama salah']);
        }

        $user = User::find(auth()->user()->id);

        // Update password
        $user->password = Hash::make($validatedData['password']);

        // Save user
        $user->save();

        // Redirect with success message
        return redirect()->back()->with('success', 'Password berhasil diubah');
    }
}
