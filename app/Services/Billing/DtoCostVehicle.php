<?php

namespace App\Services\Billing;

class DtoCostVehicle
{
    protected $id;
    protected $cost;
    protected $days;

    public function id()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function cost()
    {
        return $this->cost;
    }

    public function setCost($cost)
    {
        $this->cost = $cost;
    }
    
    public function days()
    {
        return $this->days;
    }

    public function setDays($days)
    {
        $this->days = $days;
    }
}