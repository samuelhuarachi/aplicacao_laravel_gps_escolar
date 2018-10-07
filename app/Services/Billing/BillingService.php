<?php

namespace App\Services\Billing;

use Auth;
use App\Model\Vehicle;
use Illuminate\Support\Carbon;
use App\Services\Date\DateService;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Gate;
use App\Services\Billing\DtoMonthYear;

class BillingService
{

    protected $userService, 
            $dateService, 
            $dtoCostVehicle;
    
    public function __construct(
        UserService $userService,
        DateService $dateService,
        DtoCostVehicle $dtoCostVehicle,
        DtoMonthYear $dtoMonthYear
    )
    {
        $this->userService = $userService;
        $this->dateService = $dateService;
        $this->dtoCostVehicle = $dtoCostVehicle;
        $this->dtoMonthYear = $dtoMonthYear;
    }

    public function invoice(DtoMonthYear $dtoMonthYear, Carbon $finish = null)
    {
        $start = $this->getStartDate($dtoMonthYear);

        $costPerDay = $this->costPerDay($dtoMonthYear);

        if ($finish == null) {
            $finish = $this->getFinishDate($dtoMonthYear);
        }

        $user = $this->userService->getCurrent();
        foreach ($user->allVehicles as $vehicle) {
            $this->getCostByVehicle($vehicle, $start, $finish, $costPerDay);
        }
    }

    public function getCostByVehicle(Vehicle $vehicle, Carbon $start, Carbon $finish, $costPerDay)
    {
        $created_at = Carbon::parse($vehicle->created_at);

        if ($vehicle->active == false) {
            $close_at = Carbon::parse($vehicle->close_at);

            if ($close_at->lt($start)) {
                $this->dtoCostVehicle->setId($vehicle->id);
                $this->dtoCostVehicle->setCost(0);
                $this->dtoCostVehicle->setDays(0);
                
                return $this->dtoCostVehicle;
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

                $this->dtoCostVehicle->setId($vehicle->id);
                $this->dtoCostVehicle->setCost(0);
                $this->dtoCostVehicle->setDays(0);
                
                return $this->dtoCostVehicle;
            }
            if ($created_at->gt($start)) {
                $begin = $created_at;
            } elseif ($created_at->lte($start)) {
                $begin = $start;
            }
        }

        $diffInDays = $begin->diffInDays($end);
        $total = round($diffInDays * $costPerDay, 2);

        $this->dtoCostVehicle->setId($vehicle->id);
        $this->dtoCostVehicle->setCost($total);
        $this->dtoCostVehicle->setDays($diffInDays);
        
        return $this->dtoCostVehicle;
    }

    public function getFinishDate(DtoMonthYear $dtoMonthYear): Carbon
    {
        $month = $dtoMonthYear->month();
        $year = $dtoMonthYear->year();

        if ($month === 12) {
            $month = 1;
            $year++;
        } else {
            $month++;
        }

        return Carbon::parse("{$year}-{$month}-10 23:59:59");
    }

    public function costPerDay(DtoMonthYear $dtoMonthYear)
    {
        $start = $this->getStartDate($dtoMonthYear);
        $finish = $this->getFinishDate($dtoMonthYear);

        $diffTotalDays = $start->diffInDays($finish);
        $user = $this->userService->getCurrent();
        $payment = $user->payment;
        $payPerDay = $payment / $diffTotalDays;

        return $payPerDay;
    }

    public function getCurrentMonthYear(): DtoMonthYear
    {
        $day = (int)date('d');
        $month = (int) date('m');
        $year = (int) date('Y');

        if ($day >=1 && $day <= 10) {
            $month--;
        }

        if ($month == 0) {
            $month = 12;
            $year--;
        }

        $this->dtoMonthYear->setMonth($month);
        $this->dtoMonthYear->setYear($year);
        
        return $this->dtoMonthYear;
    }

    public function getStartDate(DtoMonthYear $dtoMonthYear): Carbon
    {
        return Carbon::parse("{$dtoMonthYear->year()}-{$dtoMonthYear->month()}-11 00:00:00");
    }
}