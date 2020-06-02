<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember'))) {
            return redirect('admin/dashboard');
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    public function logout()
    {
        auth()->guard('admin')->logout();

        return redirect('admin/login');
    }
}
