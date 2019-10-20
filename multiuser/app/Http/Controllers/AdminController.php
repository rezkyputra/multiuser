<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $file=$request->file('image');
        $ext=$file->getClientOriginalExtension();
        $name=rand(100000,1001238912).".".$ext;
        $file->move('img',$name);
        $new_user=new user();
        $new_user->username=$request->username;
        $new_user->email=$request->email;
        $new_user->password=bcrypt($request->password);
        $new_user->role_id=$request->role_id;
        $new_user->image=$name;
        $new_user->save();
        
        return redirect('/admin/user')->with("success","Add Data successfully !");

        $validatedData = $request->validate([
            'username' => 'required|string',
            'password' => 'required|min:6|string',
            'email' => 'required|email',
            'role_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $user=user::find($user->id);
        unlink('img/'.$user->image);
        $user->delete();
        return redirect()->route('user.index')->with("success","Delete Data successfully !");
    }
}
