<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {
        return view('admin.profile.index');
    }

    public function updateProfile(Request $request){
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'image' => 'mimes:png,jpg,jpeg|max:2048',
        ]);

        $profile = Auth::user();
        $imagePath = handleUpload('image',$profile,env('ADMIN_PROFILE_IMAGE_UPLOAD_PATH'));
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->image = (!empty($imagePath) ? $imagePath : $profile->image);
        $profile->save();

        toastr()->success('Profile Updated Successfully');
        return redirect()->back();
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|confirmed|min:8',
        ]);

        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);

        toastr()->success('Password Updated Successfully');
        return redirect()->back();
    }
}
