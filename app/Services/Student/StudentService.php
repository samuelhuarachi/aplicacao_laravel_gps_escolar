<?php

namespace App\Services\Student;

use Auth;
use App\Model\Student;
use Illuminate\Support\Carbon;
use App\Services\User\UserService;
use App\Services\Config\ConfigService;

class StudentService
{
    protected $config;
    protected $userService;
    protected $mStudent;

    public function __construct(
        ConfigService $config,
        UserService $userService,
        Student $student)
    {
        $this->config = $config;
        $this->userService = $userService;
        $this->mStudent = $student;
    }

    public function current()
    {
        return Auth::user();
    }

    public function findVehicle(Student $student)
    {
        $shifts = $student->shifts;

        // $currentHour = Carbon::now();
        $currentHour = Carbon::createFromTime(6,25,0);

        foreach($shifts as $shift) {
            $startAtExplode = explode(":", $shift->start_at);
            $start_at = Carbon::createFromTime($startAtExplode[0], $startAtExplode[1], 0);

            $finishAtExplode = explode(":", $shift->finish_at);
            $finish_at = Carbon::createFromTime($finishAtExplode[0], $finishAtExplode[1], 0);
            
            if ($currentHour > $finish_at) {
                $diff = $finish_at->diffInMinutes($currentHour);
                if ($diff <= $this->config::TOLERANCE_HOUR) {
                    return $shift->vehicle;
                }
                continue;
            }

            if ($currentHour < $start_at) {
                $diff = $start_at->diffInMinutes($currentHour);
                if ($diff <= $this->config::TOLERANCE_HOUR) {
                    return $shift->vehicle;
                }
                continue;
            }

            if ($currentHour >= $start_at && $currentHour <= $finish_at) {
                return $shift->vehicle;
            }
        }

        return null;
    }

    public function add($data)
    {
        $user = $this->userService->getCurrent();

        unset($data["_token"]);
        $data["user_id"] = $user->id;
        $data["created_at"] = date("Y-m-d H:i:s");
        $data["updated_at"] = date("Y-m-d H:i:s");

        $this->mStudent->insert($data);
    }
}