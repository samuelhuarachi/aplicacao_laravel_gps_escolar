<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    
    public function shifts() {
        return $this->hasMany('App\Model\Shift');
    }

    public function drivers()
    {
        return $this->belongsToMany('App\Model\Driver');
    }
}
