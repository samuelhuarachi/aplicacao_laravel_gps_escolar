<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    
    public function students()
    {
        return $this->belongsToMany('App\Model\Student');
    }

    public function vehicle() {
        return $this->belongsTo('App\Model\Vehicle');
    }
}
