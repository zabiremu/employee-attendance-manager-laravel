<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Unique;

class AdminProfileController extends Controller
{
    // display admin profile
    public function create()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.profile.profile', compact('user'));
    }

    // update profile data
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'full_name' => 'required|max:255',
            'email' => 'required|max:255',
        ]);
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->save();
        $notification = [
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    // uploads image
    public function image($request)
    {
        $ext = $request->image->extension();
        $img_name = 'profile-' . uniqid() . '.' . $ext;
        $img_save = $request->image->move(public_path('uploads/user-profile-image'), $img_name);
        $save_url = env('APP_URL') . 'uploads/user-profile-image/' . $img_name;
        return ['name' => $img_name, 'url' => $save_url];
    }

    public function createPass()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.profile.password', compact('user'));
    }

    public function updatePass(Request $request)
    {
        $request->validate([
            'current_password' => 'required|min:6',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:new_password',
        ]);

        $oldPassword = Auth::user()->password;

        if (Hash::check($request->current_password, $oldPassword)) {
            $id = Auth::user()->id;
            $user = User::find($id);

            $user->password = bcrypt($request->new_password);
            $user->save();

            $notification = [
                'message' => 'Password Update Successfully',
                'alert-type' => 'success',
            ];
            return redirect()
                ->route('admin.password')
                ->with($notification);
        } else {
            $notification = [
                'message' => 'Old Password is not match',
                'alert-type' => 'error',
            ];
            return redirect()
                ->route('admin.password')
                ->with($notification);
        }
    }
}
