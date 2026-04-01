<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use App\Mail\RegistrationSuccessMail;
use App\Mail\UserReportMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    //
    public function create()
    {
        return view('register');
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log the user in
        $user = DB::table('users')->where('email', $request->email)->first();
        
        //dispatch the email sending job
        dispatch(new SendMailJob((object)$request->all())); 

        
        return redirect()->back()->with('success', 'Registration successful! Please check your email for confirmation.');
    }   
}
