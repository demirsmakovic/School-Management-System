<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function UserView()
    {
        $data['allData'] = User::all();
        return view('backend.user.view_user', $data);
    }

    public function UserAdd()
    {
        return view('backend.user.add_user');
    }

    public function UserStore(Request $request)
    {
        $request->validate([
        'email' => 'required|unique:users',
        'name' => 'required'
        ]);
        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        $notification = array(
            'message' => 'User Inserted Successfull',
            'alert-type' => 'success'
        );
        
        return Redirect()->route('user.view')->with($notification);

    }

    public function UserEdit($id)
    {
        $user = User::find($id);
        return view('backend.user.edit_user', compact('user'));
    }

    public function UserUpdate(Request $request, $id)
    {
        $data = User::find($id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        $notification = array(
            'message' => 'User Updated Successfull',
            'alert-type' => 'success'
        );
        
        return Redirect()->route('user.view')->with($notification);

    }

    public function UserDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        $notification = array(
            'message' => 'User Deleted Successfull',
            'alert-type' => 'info'
        );
        
        return Redirect()->route('user.view')->with($notification);
    }
}
