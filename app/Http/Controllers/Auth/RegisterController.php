<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Model\Plan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    protected $mPlan;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Plan $plan)
    {
        $this->middleware('guest');

        $this->mPlan = $plan;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'cpf' => 'required|string|max:20',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $hashedPassword = Hash::make($data['password']);

        $fPlan = $this->mPlan->first();

        return User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'cpf' => $data['cpf'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'payment' => $fPlan->payment,
            'period' => $fPlan->period,
            'password' => $hashedPassword,
        ]);
    }
}
