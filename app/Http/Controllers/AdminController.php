<?php

namespace App\Http\Controllers;

use App\Channel;
use App\ChannelAdmin;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use View;
use App\Http\Requests;
use Webpatser\Uuid\Uuid;

class AdminController extends Controller
{
    protected function getLogin()
    {
        return View::make('dashboard/login');
    }

    protected function postLogin(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        // only login if user is admin
        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            // return redirect()->intended('dashboard');
            return redirect('/dashboard');
        } else {
            Session::flash('message', 'danger');
            return redirect()->back()->withErrors(["Incorrect email or password."])->withInput();
        }
    }

    protected function getLogout() {
        Auth::logout();
        return redirect('/login');
    }
}
