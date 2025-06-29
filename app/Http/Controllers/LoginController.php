<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function adminIndex(){
        return view('admin.dashboard');
    }
}
