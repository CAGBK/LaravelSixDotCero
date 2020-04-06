<?php

namespace App\Http\Controllers;
use Auth;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *++++
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        if($user = Auth::user())
        {
            if ($user->isAdmin()) {
                return view('pages.admin.home');
            }

            return view('pages.user.home');
        }
        return view('auth.login');
    }
}
