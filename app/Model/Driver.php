<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{

    
    
    public function vehicles()
    {
        return $this->belongsToMany('App\Model\Vehicle');
    }
}
