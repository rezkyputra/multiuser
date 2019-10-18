<?php

namespace App\Http\Controllers;

use App\profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = profile::all();
        return view('admin.profile.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.profile.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> all();
        $new_profile = new profile();
        $new_profile-> username = $request->username;
        $new_profile-> email = $request->email;
        $new_profile-> password = $request->password;
        $new_profile-> role_id = $request->role_id;
        $new_profile-> save();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(profile $profile)
    {
        return view('admin.profile.edit',compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, profile $profile)
    {
        $new_profile = profile::find($profile->id);        
        $new_profile-> username = $request->username;
        $new_profile-> email = $request->email;
        $new_profile-> password = $request->password;
        $new_profile-> role_id = $request->role_id;
        $new_profile->save();

        return redirect()->route('admin.profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(profile $profile)
    {
        profile::destroy($profile->id);
        return redirect()->route('admin.profile.index');
    }
}
