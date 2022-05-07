<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class ForgotPasswordController extends Controller
{
    public function forgotPassword()
    {
        return view('forgot_password');
    }

    public function checkEmail()
    {
        $data = request()->validate([
            'email' => 'required',
        ]);

        $email = $data['email'];

        $user = User::where('email', $email)->first();

        if (!$user) {
            alert('Email not found!');
            return back();
        }
        $link = URL::signedRoute('change-password', ['email' => $email]);
        $html = "reset your password, click <a href='$link' >Change Password</a>";

        Mail::send(array(), array(), function ($message) use ($html, $user) {
            $message->to($user->email)
                ->subject('Change Password')
                ->setBody($html, 'text/html');
        });
        return 'email sent ! Password Reset Link has been sent! check your email.';
    }

    public function changePassword()
    {
        if (request()->email == null || !request()->hasValidSignature()) {
            abort(404);
        }

        return view('change_password');
    }

    public function updatePassword()
    {
        $data = request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $data['password'] = bcrypt($data['password']);

        $user = User::where('email', $data['email'])->first();

        $user->update($data);
        alert('Password Changed!', 'success');
        return redirect('/login');
    }
}
