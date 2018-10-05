<?php

namespace App\Http\Controllers\Cliente;


use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use App\Services\Billing\BillingService;

class BillingController extends Controller
{
    
    public function index(
        UserService $userService,
        BillingService $billingService)
    {
        $user = $userService->getCurrent();
        
        $billingList = $billingService->invoice(8, 2018);
        
        return view('admin.billing.index', compact('user'));
    }
}