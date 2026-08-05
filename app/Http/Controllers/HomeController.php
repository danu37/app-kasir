<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return auth()->check()
            ? redirect()->route(auth()->user()->isAdmin() ? 'dashboard' : 'cashier.index')
            : redirect()->route('login');
    }
}
