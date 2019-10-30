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
    }

    public function index()
    {
        $profile=user::find(auth::user()->id);
        // dd($profile);
        return view('user.profile.index', compact('profile'));
    }

    public function edit(profile $profile)
    {
        dd($profile);        
        return view('user.profile.edit', compact('user'));
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
        $user = user::find($user->id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        if (empty($request->file('image'))){
            $user->image = $user->image;
        }
        else{
            unlink('img/'.$user->image); //menghapus file lama
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('img',$newName);
            $user->image = $newName;
        }
        $user->save();
        return redirect('/admin/user')->with("success","Update Data successfully !");


        $validatedData = $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
    }
}
