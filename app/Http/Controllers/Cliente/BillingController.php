<?php

namespace App\Http\Controllers\Cliente;


use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use App\Services\Billing\BillingService;
use App\Services\Currency\CurrencyService;

class BillingController extends Controller
{
    
    public function index(
        UserService $userService,
        BillingService $billingService,
        CurrencyService $currencyService)
    {
        $user = $userService->getCurrent();
        
        $dtoMonthYear = $billingService->getCurrentMonthYear();
        $start = $billingService->getStartDate($dtoMonthYear);
        $finish = Carbon::now();
        $costPerDay = $billingService->costPerDay($dtoMonthYear);

        //$billingList = $billingService->invoice($dtoMonthYear);

        return view('admin.billing.index', 
            compact('user', 'start', 'finish', 
            'costPerDay', 'billingService', 'currencyService'));
    }
}