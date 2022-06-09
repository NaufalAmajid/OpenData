<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pagesAuthentication.login.indexLogin');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ]
        );

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $getId = Auth::user()->id;

            $updateUser = User::find($getId);
            $updateUser->is_active = 1;
            $updateUser->save();

            $resp = array(
                'request' => $request->all(),
                'status' => 'success',
                'message' => 'Login Success',
                'url' => '/dashboard',
                'data' => Auth::user()
            );

        } else {

            $resp = array(
                'request' => $request->all(),
                'status' => 'error',
                'message' => 'Username atau Password Salah',
                'url' => redirect()->intended('/dashboard'),
                'data' => Auth::user()
            );
        }

        return json_encode($resp);
    }

    public function userLogout(Request $request)
    {

        $getId = Auth::user()->id;
        $updateUser = User::find($getId);
        $updateUser->is_active = 0;
        $updateUser->save();

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $resp = array(
            'status' => 'success',
            'message' => 'Logout Success',
            'url' => '/login'
        );

        return json_encode($resp);
    }
}
