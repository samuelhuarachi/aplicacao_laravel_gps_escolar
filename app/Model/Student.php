<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\StudentResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'user_id', 'name', 'lastname', 'email', 'username',
        'age', 'gender', 'phone', 'cell_phone', 'street',
        'number', 'complement', 'neighborhood', 'zipcode',
        'city', 'state', 'fathers_firstname', 'fathers_lastname',
        'fathers_phone', 'fathers_cell_phone', 'mothers_firstname',
        'mothers_lastname', 'mothers_phone', 'mothers_cell_phone',
        'other_firstname', 'other_lastname', 'other_phone', 
        'other_cell_phone', 'lat', 'lng'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guard = 'student';

    public function shifts()
    {
        return $this->belongsToMany('App\Model\Shift');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new StudentResetPasswordNotification($token));
    }
}
