<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\support\Facades\Auth;
use App\Models\User;
use Illuminate\support\Str;
use Illuminate\view\View;


class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    } 
    
    
    public function regis()
{
    return view('auth.register');
}

public function store(request $request)
{ 
    user::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'remember_token' => Str::random(60),
    ]);


    return redirect ('login');
}

public function logout(request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login');
}
}

