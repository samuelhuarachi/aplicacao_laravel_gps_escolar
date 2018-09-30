<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\User\UserService;
use App\Firebase\Firebase;
use App\Model\Vehicle;
use App\User;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\VehicleRequest;

class VehicleController extends Controller
{
    
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
            [$vehicleFind, $user->current()])) {
                throw new \Exception("Você não está autorizado a visualizar esta página");
        }

        return view('admin.vehicle.driver.add', 
            compact('user', 'vehicleFind'));
    }
}