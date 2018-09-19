<?php

namespace App\Firebase;

use App\Firebase\ServiceAccount;
use Kreait\Firebase\Factory;

class Firebase 
{
    protected $serviceAccount;

    public function __construct(ServiceAccount $serviceAccount)
    {
        $this->serviceAccount = $serviceAccount;
    }

    public function getInstance()
    {
        return (new Factory)
            ->withServiceAccount($this->serviceAccount->get())
            ->create();
    }
}

