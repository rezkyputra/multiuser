<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = user::all();
        return view('user.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function edit(user $user)
    {
        return view('user.user.edit',compact('user'));
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
        $validatedData = $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
        ]);

        $user = user::find($user->id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->save();

        return redirect('/user/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        user::destroy($user->id);
        return redirect('/user/user');
    }
}
