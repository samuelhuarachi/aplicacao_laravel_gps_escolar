<?php

namespace App\Http\Controllers\Cliente;

use App\User;
use App\Model\Shift;
use App\Model\Driver;
use App\Model\Student;
use App\Model\Vehicle;
use App\Firebase\Firebase;
use Illuminate\Http\Request;
use App\Services\User\UserService;
use App\Http\Requests\ShiftRequest;
use App\Http\Controllers\Controller;
use App\Services\Shift\ShiftService;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\VehicleRequest;
use Illuminate\Support\Facades\Session;
use App\Services\Vehicle\VehicleService;

class VehicleController extends Controller
{
    
    protected $vehicleService;

    public function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }

    public function index(UserService $userService)
    {
        $user = $userService->getCurrent();
        return view('admin.vehicle.index', compact('user'));
    }

    public function new(
        VehicleRequest $request,
        Firebase $firebase,
        Vehicle $vechicle,
        User $user
    )
    {
        $input = $request->all();
        
        $fb = $firebase->getInstance();
        $database = $fb->getDatabase();
        $reference = $database->getReference('gps');

        $data = [
            'lat' => -22.925822,
            'lng' => -47.061582,
        ];

        $vehicleGpsKey = $reference->push()->getKey();

        $updates = [
            $vehicleGpsKey => $data
        ];
        
        $reference
           ->update($updates);
        
        $vechicle->insert([
            'user_id' => $user->current()->id,
            'placa' => $input['placa'],
            'firebasegps' => $vehicleGpsKey,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        
        return redirect()->route('admin.vehicle.index');
    }

    public function newDriver(
        $id, 
        User $user, 
        Vehicle $vehicle
    )
    {
        $vehicleFind = $vehicle->find($id);
        if (!$vehicleFind) {
            throw new \Exception("Veículo não encontrado");
        }

        if (!Gate::allows('user-vehicle', 
            [$vehicleFind])) {
                throw new \Exception("Você não está autorizado a visualizar esta página");
        }

        return view('admin.vehicle.driver.add', 
            compact('user', 'vehicleFind'));
    }

    public function attachDriver(
        Vehicle $vehicle,
        Driver $driver,
        UserService $userService
    )
    {
        if (!Gate::allows('vehicle-attach-driver', 
            [$vehicle, $driver, $userService->getCurrent()])) {
                throw new \Exception("Você não está autorizado a visualizar esta página");
        } else {

            if (!$vehicle->drivers->contains($driver->id)) {
                $vehicle->drivers()->attach($driver);
                $vehicle->save();
            }

            return redirect()->route('admin.vehicle.index');
        }
    }

    public function detachDriver(
        Vehicle $vehicle,
        Driver $driver,
        UserService $userService
    )
    {
        if (!Gate::allows('vehicle-attach-driver', 
            [$vehicle, $driver, $userService->getCurrent()])) {
                throw new \Exception("Você não está autorizado a visualizar esta página");
        } else {

            if ($vehicle->drivers->contains($driver->id)) {
                echo 'ok';
                $vehicle->drivers()->detach($driver);
                $vehicle->save();
            }

            return redirect()->route('admin.vehicle.index');
        }
    }

    public function addShift(
        Vehicle $vehicle,
        UserService $userService
    )
    {
        

        return view('admin.vehicle.shift.add', 
            compact('vehicle', 'userService'));
    }

    public function newShift(
        ShiftRequest $request, 
        ShiftService $shiftService
    )
    {

        $shiftService->new($request->all());
        return redirect()->route('admin.vehicle.index');
    }

    public function deleteShift(
        Vehicle $vehicle,
        Shift $shift
    )
    {
        $this->vehicleService->deleteShift($vehicle, $shift);
        return redirect()->route('admin.vehicle.index');
    }

    public function editShift(
        Shift $shift, 
        UserService $userService)
    {
        $user = $userService->getCurrent();

        return view('admin.vehicle.shift.edit', 
            compact('shift', 'user'));
    }

    public function updateShift(
        ShiftRequest $request,
        ShiftService $shiftService,
        Session $session)
    {
        $shiftService->update($request->all());

        $session::flash('flash_message','Atualizado.');

        return redirect()->route('admin.vehicle.index');
    }

    public function edit(Vehicle $vehicle)
    {
        if (!Gate::allows('user-vehicle', 
            [$vehicle])) {
                throw new \Exception("Você não está autorizado a visualizar esta página");
        }

        return view('admin.vehicle.edit', 
            compact('vehicle'));
    }

    public function update(
        VehicleRequest $request,
        VehicleService $vehicleService,
        Session $session)
    {
        $vehicleService->update($request->all());

        $session::flash('flash_message','Atualizado.');
        return redirect()->route('admin.vehicle.index');
    }

    public function delete(
        Vehicle $vehicle,
        VehicleService $vehicleService,
        Session $session)
    {
        if (!Gate::allows('user-vehicle', 
            [$vehicle])) {
                throw new \Exception("Você não está autorizado a visualizar esta página");
        }

        $vehicleService->delete($vehicle);

        $session::flash('flash_message','Deletado.');
        return redirect()->route('admin.vehicle.index');
    }
} 