<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profile', compact('user'));
    }

    // 'first_name' => 'required',
    //         'last_name' => 'required',
    //         'middle_name' => 'required',
    //         'birth_date' => 'required',
    //         'cellphone_number' => '',
    //         'landline_number' => '',
    //         'address' => 'required',
    //         'sex' => ['required', Rule::in(['male', 'female'])],
    //         'email' => 'required|unique:users,email',
    //         'password' => 'required|min:8',

    public function updatePersonal()
    {
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'birth_date' => 'required',
            'address' => 'required',
            'sex' => ['required', Rule::in(['male', 'female'])],
        ]);


        if (request()->has('image')) {
            $data['image'] = request()->image->store('public');
        }


        auth()->user()->update($data);

        alert("personal updated successfully", 'success');

        return back();
    }

    public function updateContact()
    {
        $data = request()->validate([
            'landline_number' => '',
            'cellphone_number' => '',
        ]);

        auth()->user()->update($data);

        alert("contacts updated successfully", 'success');

        return back();
    }

    public function updateAccount()
    {
        $data = request()->validate([
            'email' => 'required',
            'old_password' => 'required',
            'new_password' => 'required|min:8',
        ]);
        $email = $data['email'];
        $user = User::where('email', $email)->first();

        if ($user != null && $user->id != auth()->id()) {
            alert('failed to change your email, Email has been already taken!');
            return back();
        }

        if (!Hash::check($data['old_password'], auth()->user()->password)) {
            alert("old password is wrong!");
            return back();
        }

        $data['password'] = bcrypt($data['new_password']);
        unset($data['new_password']);
        unset($data['old_password']);

        auth()->user()->update($data);

        alert("account updated successfully", 'success');

        return redirect("/profile/$email");
    }
}
