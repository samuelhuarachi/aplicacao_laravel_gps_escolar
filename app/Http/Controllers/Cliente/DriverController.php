<?php

namespace App\Http\Controllers\Cliente;

use App\Model\Driver;
use Illuminate\Http\Request;
use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRequest;
use Illuminate\Support\Facades\Hash;

class DriverController extends Controller
{
    
    public function index(UserService $userService, Driver $driver)
    {
        $user = $userService->getCurrent();
        return view('admin.driver.index', 
            compact('user', 'driver'));
    }

    public function add(UserService $userService)
    {
        $user = $userService->getCurrent();

        return view('admin.driver.add', 
            compact('user'));
    }

    public function new(
        DriverRequest $request, 
        Driver $driver, 
        UserService $userService
    )
    {
        $input = $request->all();

        $data = [
            'user_id'   => $userService->getCurrent()->id,
            'name'      => $input['name'],
            'lastname'  => $input['lastname'],
            'rg'        => $input['rg'],
            'username'  => $input['username'],
            'password'  => Hash::make($input['password']),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        $driver->insert($data);

        return redirect()->route('admin.driver.index');
    }
}
