<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){
        return view('admin.setting.changepassword');
    }

    public function change(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Password tidak sama dengan password saat login");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Password baru tidak boleh sama dengan password lama");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }

    // public function change(Request $request){
 
    //     if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
    //     // The passwords matches
    //     return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
    //     }
         
    //     if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
    //     //Current password and new password are same
    //     return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
    //     }
    //     if(!(strcmp($request->get('new-password'), $request->get('new-password-confirm'))) == 0){
    //                 //New password and confirm password are not same
    //                 return redirect()->back()->with("error","New Password should be same as your confirmed password. Please retype new password.");
    //     }
    //     //Change Password
    //     $user = Auth::user();
    //     $user->username = bcrypt($request->get('username'));
    //     $user->email = bcrypt($request->get('email'));
    //     $user->password = bcrypt($request->get('new-password'));
    //     $user->save();
         
    //     return redirect()->back()->with("success","Password changed successfully !");
         
    // }
}
