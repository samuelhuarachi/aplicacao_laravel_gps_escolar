<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('pt_BR');

        DB::table('users')->insert([
            'name' => 'Samuel',
            'lastname' => 'Gomes Huarachi',
            'email' => 'samuel.huarachi@gmail.com',
            'phone' => '(19) 3208-1282',
            'password' => bcrypt('sempre'),
            'created_at' => date('Y-m-d H:m:i'),
            'updated_at' => date('Y-m-d H:m:i'),
            'token' => md5(uniqid(rand(), true)),
            'cpf' => $faker->cpf,
            'payment' => 10,
            'period' => 30
        ]);

        DB::table('users')->insert([
            'name' => 'Delminha',
            'lastname' => 'Regina Gomes Huarachi',
            'email' => 'delminha.007@gmail.com',
            'phone' => '(19) 3208-1282',
            'password' => bcrypt('sempre'),
            'created_at' => date('Y-m-d H:m:i'),
            'updated_at' => date('Y-m-d H:m:i'),
            'token' => md5(uniqid(rand(), true)),
            'cpf' => $faker->cpf,
            'payment' => 10,
            'period' => 30
        ]);
    }
}
