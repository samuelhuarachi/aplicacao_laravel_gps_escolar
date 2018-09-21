<?php

namespace App\Http\Controllers\Aluno;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Firebase\CustomToken;

class HomeController extends Controller
{
    
    public function index(CustomToken $customToken)
    {

        // $reference = $database->getReference('gps/-LMQDNwUboUGHl0t4F5D');
        // $snapshot = $reference->getSnapshot();
        // $value = $snapshot->getValue();
        // dump($value);die;

        // da pra cachear esse token
        $token = $customToken->generate("samuel@gmail.com");
        
        return view('aluno.home.index', compact('token'));
    }

}
