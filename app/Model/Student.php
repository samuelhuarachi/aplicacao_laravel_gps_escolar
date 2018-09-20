<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    

    public function shifts()
    {
        return $this->belongsToMany('App\Model\Shift');
    }
}
