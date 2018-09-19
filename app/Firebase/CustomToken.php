<?php

namespace App\Firebase;

use App\Firebase\Firebase;

class CustomToken
{
    protected $firebase;

    public function __construct(Firebase $firebase)
    {
        $this->firebase = $firebase->getInstance();
    }

    public function generate($uid, $format = "string")
    {
        $customToken = $this->firebase->getAuth()->createCustomToken($uid);
        
        if ($format == "string") {
            return (string) $customToken;
        }
        
        return $customToken;
    }
}


