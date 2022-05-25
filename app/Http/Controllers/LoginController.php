<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('pagesAuthentication.login.indexLogin');
    }

    public function process(Request $request)
    {

        if ($request->username == 'admin' && $request->password == 'admin') {
            $resp = array(
                'request' => $request->all(),
                'status' => 'success',
                'message' => 'Login Success'
            );
        } else {
            $resp = array(
                'request' => $request->all(),
                'status' => 'error',
                'message' => 'Username and Password is failed'
            );
        }

        return json_encode($resp);
    }
}
