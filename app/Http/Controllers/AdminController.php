<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'User Logout Successfully done!.',
            'alert-type' => 'success',
        );
        return redirect('/login')->with($notification);
    }

    public function profile(Request $request)
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function editProfile(Request $request)
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    }
    
    public function updateProfile(Request $request)
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        $userData->name = $request->name;
        $userData->email = $request->email;
        $userData->username = $request->username;
        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');
            $filename = date('ymdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images/'), $filename);
            $userData->profile_image = $filename;
        }
        $userData->save();
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.profile')->with($notification);
    }
    
    public function changePassword(Request $request)
    {
        return view('admin.admin_change_password');
    }
    public function updatePassword(Request $request)
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        $userData->password = $request->password;
        $userData->save();
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.profile')->with($notification);
    }
}
