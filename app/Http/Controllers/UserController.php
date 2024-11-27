<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function Index()
    {
        return view('frontend.index');
    }

    // public function Login() {
    //     return view('auth.login');
    // }

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('frontend.dashboard.edit_profile', compact('profileData'));
    }

    public function UserStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        // check if it have img or not
        if ($request->file('photo')) {
            $file = $request->file('photo');
            // removing existing img (when update img it will be replace new img)
            @unlink(public_path('upload/user_images/' . $data->photo));
            // generated year, month, date and get of img ex. 123421.avatar-2.png
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['photo'] = $filename;
        }
        $data->save();

        // message notification
        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function UserLogout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Flash message for SweetAlert2
        return redirect('/login')->with('status', 'User Logout Successfully');
    }

    public function UserChangePassword(){

        return view('frontend.dashboard.user_change_password');
    }

    public function ChangePasswordStore(Request $request){
        // validation area
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if(!Hash::check($request->old_password, auth::user()->password)){
            $notification = array(
                'message' => 'Old Password Does Not Match!',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }

        // update the new password
        User::whereId(auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $notification = array(
            'message' => 'Password Change Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
