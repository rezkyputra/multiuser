<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use auth;

class ProfileController extends Controller
{    
    
    public function __construct()
    {
        $this->middleware('auth');        
        $this->middleware('user');
    }

    public function index()
    {
        $profile=user::find(auth::user()->id);
        // dd($profile);
        return view('user.profile.index', compact('profile'));
    }

    public function store(Request $request)
    {
        $user=User::find(auth::user()->id);

        $profile = new profile();
        $profile->fullname=$request->fullname;
        $profile->gender=$request->gender;
        $profile->no_telp=$request->no_telp;
        $profile->expected_sallary=$request->expected_sallary;
        $profile->address=$request->address;

        $user->profile()->save($profile);
        
        return redirect('/profile')->with("success","Add Data Profile successfully !");
    }

    public function edit(user $profile)
    {
        // dd($profile);        
        return view('user.profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,user $user)
    {
        
    }
}
