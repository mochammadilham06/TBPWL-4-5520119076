<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // public function index(){
    //     return view('profile');
    // }
    public function index(){
        $user = Auth::user();
        $users = User::all();
        return view('view_user', compact('user', 'users'));
    }
    public function add_user(Request $req){
        $users = new User;

        $users->name = $req->get('name');
        $users->email = $req->get('email');
        $users->password = $req->get('password');
        $users->roles_id = $req->get('roles_id');

        if ($req->hasFile('photo')) {
            $extension = $req->file('photo')->extension();

            $filename = 'photo_user_' . time() . '.' . $extension;

            $req->file('photo')->storeAs(
                'public/photo_user',
                $filename
            );

            $users->photo = $filename;
        }

        $users->save();

        $notification = array(
            'message' => 'Data added succesfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.users$userss')->with($notification);
    }
}
