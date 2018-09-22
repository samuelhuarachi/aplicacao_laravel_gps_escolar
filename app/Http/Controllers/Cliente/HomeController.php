<?php

namespace App\Http\Controllers\Cliente;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    
    public function index(User $user)
    {
        $user = $user->current();

        return view('admin.home.index');
    }

}
