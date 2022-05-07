<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login()
    {
        $data = request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            alert("No existing account!", 'danger');
            return back();
        }

        if ($user->is_approved == null) {
            alert("Your account is under review!", 'info');
            return back();
        }

        if (!Hash::check($data['password'], $user->password)) {
            alert("Credentials are not match!", 'danger');
            return back();
        }

        Auth::login($user);

        return redirect('/home');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register()
    {
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'birth_date' => 'required',
            'cellphone_number' => '',
            'landline_number' => '',
            'address' => 'required',
            'sex' => ['required', Rule::in(['male', 'female'])],
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
        ]);
        $data['password'] = bcrypt($data['password']);
        User::create($data);

        alert("You're information has been submitted, We will email you if you're account is approve!", 'success');
        return back();
    }

    public function logout()
    {
        auth()->user()->update([
            'last_opened' => now(),
        ]);

        Auth::logout();
        return redirect('/login');
    }
}
