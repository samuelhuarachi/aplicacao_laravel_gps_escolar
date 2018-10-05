<?php

namespace App\Services\Billing;

class DtoMonthYear
{

    protected $month;
    protected $year;


    public function setMonth(int $month)
    {
        $this->month = $month;
    }

    public function setYear(int $year)
    {
        $this->year = $year;
    }

    public function month(): int
    {
        return $this->month;
    }

    public function year(): int
    {
        return $this->year;
    }
}