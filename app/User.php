<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password', 
        'lastname', 'cpf', 'payment', 'period', 'token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function students() 
    {
        return $this->hasMany('App\Model\Student');
    }

    public function vehicles() 
    {
        return $this->hasMany('App\Model\Vehicle')->where('active', '=', true);
    }

    public function deletedVehicles() 
    {
        return $this->hasMany('App\Model\Vehicle')->where('active', '=', false);
    }

    public function allVehicles()
    {
        return $this->hasMany('App\Model\Vehicle');
    }

    public function drivers() 
    {
        return $this->hasMany('App\Model\Driver');
    }
    
    public function current()
    {
        return Auth::user();
    }
}
