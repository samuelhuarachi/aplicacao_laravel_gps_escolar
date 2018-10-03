<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('user-vehicle', function ($user, $vehicle) {
            return $user->id == $vehicle->user_id;
        });
        
        Gate::define('vehicle-attach-driver', 
            function ($user, $vehicle, $driver) {
                return ($user->id == $vehicle->user_id && $user->id == $driver->user_id);
            });

        Gate::define('vehicle-shift', function ($user, $vehicle, $shift) {
            return $shift->vehicle_id == $vehicle->id;
        });

        Gate::define('user-students', function ($user, $student, $array) {
            foreach($array as $value) {
                $studentF = $student->find((int)$value);
                
                if (!$studentF) {
                    throw new \Exception("Aluno não encontrado");
                }
                
                if ($studentF->user_id != $user->id) {
                    return false;
                }
            }
            return true;
        });
    }
}
