<?php

namespace App\Firebase;

use Kreait\Firebase\ServiceAccount as sa;

class ServiceAccount
{

    public function get()
    {
        return sa::fromJsonFile(__DIR__.'/../../vectoriza-gps-8a28621d253c.json'); 
    }
}