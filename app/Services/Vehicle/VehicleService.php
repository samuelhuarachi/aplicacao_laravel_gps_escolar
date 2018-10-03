<?php

namespace App\Services\Vehicle;

use Auth;
use App\Model\Shift;
use App\Model\Vehicle;
use App\Firebase\Firebase;
use Illuminate\Support\Carbon;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Gate;

class VehicleService
{
    protected $userService, $mVehicle, $firebase;

    public function __construct(
        UserService $userService,
        Vehicle $vehicle,
        Firebase $firebase)
    {
        $this->userService = $userService;
        $this->mVehicle = $vehicle;
        $this->firebase = $firebase;
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

    public function update($data)
    {
        unset($data["_method"]);
        unset($data["_token"]);

        $id = (int)$data["id"];
        unset($data["id"]);
        $vehicle = $this->mVehicle->find($id);

        if (!$vehicle) {
            throw new \Exception("Veículo não encontrado.");
        }

        if (!Gate::allows('user-vehicle', 
            [$vehicle])) {
                throw new \Exception("Você não está autorizado a visualizar esta página");
        }

        $vehicle->update($data);
    }

    public function delete(
        Vehicle $vehicle
    )
    {
        if (!Gate::allows('user-vehicle', 
            [$vehicle])) {
                throw new \Exception("Você não está autorizado a visualizar esta página");
        }

        if ($vehicle->active == 0) {
            return;
        }

        $vehicle->update([
                "active" => false,
                "close_at" => date("Y-m-d H:i:s")
            ]);

        foreach($vehicle->shifts as $shift)
        {
            $shift->students()->detach();
            $shift->delete();
        }

        $vehicle->drivers()->detach();

        $fbInstance = $this->firebase->getInstance();
        $database = $fbInstance->getDatabase();
        $reference = $database->getReference('gps')->getChild($vehicle["firebasegps"]);
        $reference->remove();
    }
}