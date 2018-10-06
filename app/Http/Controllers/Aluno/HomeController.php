<?php

namespace App\Http\Controllers\Aluno;

use App\Model\Student;
use Illuminate\Http\Request;
use App\Firebase\CustomToken;
use App\Http\Controllers\Controller;
use App\Services\Student\StudentService;

class HomeController extends Controller
{
    
    public function index(
        CustomToken $customToken, 
        StudentService $studentService
    )
    {
        $student = $studentService->current();
        $vehicle = $studentService->findVehicle($student);

        $token = null;
        if ($vehicle) {
            // da pra cachear esse token
            $token = $customToken->generate($student->username);
        }

        return view('aluno.home.index', 
                compact('token', 'vehicle'));
    }
}