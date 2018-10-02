<?php

namespace App\Services\Vehicle;

use Auth;
use App\Model\Shift;
use App\Model\Vehicle;
use Illuminate\Support\Carbon;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Gate;

class VehicleService
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function deleteShift(
        Vehicle $vehicle, 
        Shift $shift
    )
    {

        if (
            !Gate::allows('user-vehicle', [$vehicle, $this->userService->getCurrent()])
            ||
            !Gate::allows('vehicle-shift', [$vehicle, $shift])
        )
        {
            throw new \Exception("Você não está autorizado a visualizar esta página");  
        }

        $shift->delete();
    }
}