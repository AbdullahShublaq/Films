<?php

namespace App\Http\Controllers\Dashboard;

use App\Admin;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $admins = Admin::whereRoleIs('admin')->count();
        $clients = User::count();

        return view('dashboard.home', compact('admins', 'clients'));
    }
}
