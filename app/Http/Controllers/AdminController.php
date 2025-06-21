<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Mail\WebsiteMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function AdminLogin()
    {
        return view('admin.auth.login');
    } //End Method

    public function AdminDashboard()
    {
        return view('admin.index');
    } //End Method

    public function AdminLoginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $check = $request->all();

        $data = [
            'email' => $check['email'],
            'password' => $check['password'],
        ];

        if (Auth::guard('admin')->attempt($data)) {
            return redirect()->route('admin.dashboard')->with('success', 'Login Successfully');
        } else {
            return redirect()->route('admin.login')->with('error', 'Invalid Credentials');
        }
    } //End Method

    public function AdminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Logout Successfully');
    } //End Method

    public function AdminForgetPassword()
    {
        return view('admin.auth.forget_password');
    } //End Method

    public function AdminForgetPasswordSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $admin_data = Admin::where('email', $request->email)->first();

        if (!$admin_data) {
            return redirect()->back()->with('error', 'Email Not Found');
        }

        $token = hash('sha256', time());
        $admin_data->token = $token;
        $admin_data->update();

        $reset_link = url('admin/reset/password/' . $token . '/' . $request->email);
        $subject = 'Reset Password';
        $message = 'Please Click on below link to reset password <br>';
        $message .= "<a href='" . $reset_link . "'> Click Here </a>";

        Mail::to($request->email)->send(new WebsiteMail($subject, $message));

        return redirect()->back()->with('success', 'Reset Password Link Send On Your Email');
    } //End Method

    public function AdminResetPassword($token, $email)
    {
        $admin_data = Admin::where('email', $email)->where('token', $token)->first();

        if (!$admin_data) {
            return redirect()->route('admin.login')->with('error', 'Invalid Token or Email');
        }

        return view('admin.auth.reset_password', compact('token', 'email'));
    } //End Method

    public function AdminResetPasswordSubmit(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        $admin_data = Admin::where('email', $request->email)->where('token', $request->token)->first();
        $admin_data->password = Hash::make($request->password);
        $admin_data->token = '';
        $admin_data->update();

        return redirect()->route('admin.login')->with('success', 'Password Reset Successfully');
    } //End Method

    public function AdminProfile()
    {
        $id = Auth::guard('admin')->id();

        $profile_data = Admin::find($id);

        return view('admin.profile.profile_dashboard', compact('profile_data'));
    } //End Method
}
