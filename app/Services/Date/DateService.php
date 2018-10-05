<?php

namespace App\Services\Date;

use Auth;
use Illuminate\Support\Carbon;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Gate;

class DateService
{

    public function getDaysPayment()
    {
        $day = (int)date("d");
        $month = (int)date("m");
        $year = (int)date("Y");

        $dayStart = $this->calculateDayStart($day, $month, $year);
        $start = Carbon::parse("{$dayStart["year"]}-{$dayStart["month"]}-{$dayStart["day"]} 00:00:00");
        
        $dayFinish = $this->calculateDayFinish($day, $month, $year);
        $finish = Carbon::parse("{$dayFinish["year"]}-{$dayFinish["month"]}-{$dayFinish["day"]} 23:59:59");
        $now = Carbon::now();

        $diffNow = $start->diffInDays($now);
        $diffTotal = $start->diffInDays($finish);
        
    }

    public function calculateDayStart($day, $month, $year)
    {
        $day <= 10 ? $month-- : $month;

        if ($month == 0) {
            $month = 12;
            $year = $year - 1;
        }

        return ["day" => 11, "month" => $month, "year" => $year];
    }

    public function calculateDayFinish($day, $month, $year)
    {
        $day <= 10 ? $month : $month++;

        if ($month == 13) {
            $month = 1;
            $year = $year + 1;
        }

        return ["day" => 10, "month" => $month, "year" => $year];
    }
}