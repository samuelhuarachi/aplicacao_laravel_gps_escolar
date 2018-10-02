<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $fillable = [
        'vehicle_id', 'name', 'annotation', 'active',
        'start_at', 'finish_at', 'created_at', 'updated_at'
    ];
    
    public function students()
    {
        return $this->belongsToMany('App\Model\Student');
    }

    public function vehicle() {
        return $this->belongsTo('App\Model\Vehicle');
    }
}
