<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class ProfileController extends Controller
{
    function index(){
        return view('admin.profile.index');
    }

    function profilepost(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        $old = Auth::user()->name;
            User::find(Auth::id())->update([
                'name'=>$request->name
            ]);
            return back()->with('profile-update', 'profile update successfully ' .  $old . 'to' . $request->name);
    }
    function profilepassword(Request $request){
        $request->validate([
            'old-password'=>'required',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required'

        ]);
        print_r($request->all());
        
        // print-r($request->all());

    }
}
