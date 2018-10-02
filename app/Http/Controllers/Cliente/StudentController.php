<?php

namespace App\Http\Controllers\Cliente;

use App\Model\Student;
use Illuminate\Http\Request;
use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Services\Student\StudentService;

class StudentController extends Controller
{
    
    public function index(
        UserService $userService)
    {
        $user = $userService->getCurrent();
        return view('admin.student.index', compact('user'));
    }

    public function add()
    {
        return view('admin.student.add');
    }

    public function new(
        StudentRequest $request, 
        StudentService $studentService)
    {
        $studentService->add($request->all());
        return redirect()->route('admin.student.index');
    }
}
