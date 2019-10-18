<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = user::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.user.create');
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
        $new_user = new user();
        $new_user-> username = $request->username;
        $new_user-> email = $request->email;
        $new_user-> password = bcrypt($request->password);
        $new_user-> role_id = $request->role_id;
        $new_user-> save();

        $validatedData = $request->validate([
            'username' => 'required|string',
            'password' => 'required|min:6|string',
            'email' => 'required|email',
        ]);

    
    return redirect('/admin/user');
    }

    public function edit(user $user)
    {
        return view('admin.user.edit',compact('user'));
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

        return redirect('/admin/user');
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
        return redirect('/admin/user');
    }
}
