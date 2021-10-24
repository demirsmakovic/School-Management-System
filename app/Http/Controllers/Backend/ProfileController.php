<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function ProfileView()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.user.view_profile', compact('user'));
    }

    public function ProfileEdit()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.user.edit_profile', compact('user'));
    }

    public function ProfileUpdate(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/'.$user->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $user->image = $filename;
        }
        $user->save();

        $notification = array(
            'message' => 'Profile Image Updated Successfull',
            'alert-type' => 'success'
        );
        
        return Redirect()->route('profile.view')->with($notification);
    }

    public function PasswordChange()
    {
        return view('backend.user.change_password');
    }

    public function PasswordUpdate(Request $request){
        $validatedData = $request->validate([
           'oldpassword' => 'required',
           'password' => 'required|confirmed',
       ]);


       $hashedPassword = Auth::user()->password;
       if (Hash::check($request->oldpassword,$hashedPassword)) {
           $user = User::find(Auth::id());
           $user->password = Hash::make($request->password);
           $user->save();
           Auth::logout();
           return redirect()->route('login');
       }else{
           return redirect()->back();
       }
    }

    
}
