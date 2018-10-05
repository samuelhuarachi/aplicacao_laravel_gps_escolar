<?php

namespace App\Services\Billing;

use Auth;
use Illuminate\Support\Carbon;
use App\Services\Date\DateService;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Gate;

class BillingService
{

    protected $userService, $dateService;
    
    public function __construct(
        UserService $userService,
        DateService $dateService
    )
    {
        $this->userService = $userService;
        $this->dateService = $dateService;
    }

    public function invoice($month, $year)
    {
        $start = Carbon::parse("{$year}-{$month}-11 00:00:00");

        if ($month === 12) {
            $month = 1;
            $year++;
        } else {
            $month++;
        }

        $finish = Carbon::parse("{$year}-{$month}-10 23:59:59");
        
        $diffTotalDays = $start->diffInDays($finish);
        $user = $this->userService->getCurrent();
        $payment = $user->payment;
        $payPerDay = $payment / $diffTotalDays;
        
        foreach ($user->allVehicles as $vehicle) {
            $created_at = Carbon::parse($vehicle->created_at);

            if ($vehicle->active == false) {
                $close_at = Carbon::parse($vehicle->close_at);

                if ($close_at->lt($start)) {
                    continue;
                }

                if ($close_at->gte($finish)) {
                    $end = $finish;
                } elseif ($close_at->gt($start)) {
                    $end = $close_at;
                } else {
                    $end = $close_at;
                }

                if ($created_at->lt($start)) {
                    $begin = $start;
                } else {
                    $begin = $created_at;
                }

            }

            if ($vehicle->active == true) {
                $end = $finish;
                if ($created_at->gt($finish)) {
                    continue;
                }
                if ($created_at->gt($start)) {
                    $begin = $created_at;
                } elseif ($created_at->lte($start)) {
                    $begin = $start;
                }
            }

            $diffInDays = $begin->diffInDays($end);
            $total = round($diffInDays * $payPerDay, 2);
            

            dump($diffInDays);
            dump($total);
            dump("--------------------");
        }
    }
}