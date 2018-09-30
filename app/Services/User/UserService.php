<?php

namespace App\Services\User;

use Auth;
use App\Model\User;
use Illuminate\Support\Carbon;

class UserService
{
    

    public function getCurrent()
    {
        return Auth::user();
    }
}