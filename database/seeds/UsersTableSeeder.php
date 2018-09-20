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
        DB::table('users')->insert([
            'name' => 'Samuel',
            'lastname' => 'Gomes Huarachi',
            'email' => 'samuel.huarachi@gmail.com',
            'password' => bcrypt('sempre'),
            'created_at' => date('Y-m-d H:m:i'),
            'updated_at' => date('Y-m-d H:m:i')
        ]);
    }
}
