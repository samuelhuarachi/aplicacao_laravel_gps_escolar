<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'placa', 'active', 'close_at', 'last_payment',
        'firebasegps', 'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function shifts() {
        return $this->hasMany('App\Model\Shift');
    }

    public function drivers()
    {
        return $this->belongsToMany('App\Model\Driver');
    }
}
