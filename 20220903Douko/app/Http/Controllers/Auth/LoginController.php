<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class LoginController extends Controller
{
    protected function loggedOut(\Illuminate\Http\Request $request) {
    return redirect('login');
    }
}