<?php

namespace App\Services\Shift;

use Auth;
use App\Model\Shift;
use App\Model\Student;
use App\Model\Vehicle;
use Illuminate\Support\Carbon;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Gate;
use App\Services\Config\ConfigService;

class ShiftService
{

    protected 
    $mShift, 
    $mVehicle, 
    $mStudent,
    $userService;

    public function __construct(
        Shift $shift, 
        Vehicle $vehicle, 
        UserService $userService,
        Student $student
    )
    {
        $this->mShift = $shift;
        $this->mVehicle = $vehicle;
        $this->userService = $userService;
        $this->mStudent = $student;
    }

    public function new($data)
    {
        try {
            unset($data['_token']);

            $vehicleId = (int)$data['vehicle_id'];
            $vehicleFind = $this->mVehicle->find($vehicleId);

            if (!$vehicleFind) {
                throw new \Exception("Veículo não encontrado.");
            }

            if (!Gate::allows('user-vehicle', 
                [$vehicleFind, $this->userService->getCurrent()])) {
                    throw new \Exception("Você não está autorizado a visualizar esta página");
            }

            $data['vehicle_id'] = $vehicleId;
            $data['start_at'] = $data['start_at'] . ":00";
            $data['finish_at'] = $data['finish_at'] . ":00";
            
            if (!isset($data['active'])) {
                $data['active'] = 0;
            }

            $data['active'] === "on" ? $data['active'] = 1 : $data['active'] = 0;
            
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['created_at'] = date('Y-m-d H:i:s');

            $this->mShift->insert($data);
        } catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function update($data)
    {
        $id = (int)$data["id"];
        $shift = $this->mShift->find($id);

        if (!$shift) {
            throw new \Exception("Turno não encontrado.");
        }

        if (!Gate::allows('user-vehicle', 
            [$shift->vehicle, $this->userService->getCurrent()])) {
                throw new \Exception("Você não está autorizado a visualizar esta página");
        }

        if (!Gate::allows('user-students', 
            [$this->mStudent, $data["student_id"]])) {
                throw new \Exception("Você não está autorizado a visualizar esta página");
        }

        $shift->students()->sync($data["student_id"]);
        
        unset($data['_token']);
        unset($data['_method']);

        if (!isset($data['active'])) {
            $data['active'] = 0;
        }

        $data['active'] === "on" ? $data['active'] = 1 : $data['active'] = 0;

        $data['start_at'] = $data['start_at'] . ":00";
        $data['finish_at'] = $data['finish_at'] . ":00";

        $shift->update($data);
    }
}