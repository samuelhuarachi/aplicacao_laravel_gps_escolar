<?php

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('pt_BR');

        DB::table('drivers')->insert([
            'user_id' => 1,
            'username' => 'driver1',
            'password' => bcrypt('123abc'),
            'name' => 'Reginaldo',
            'lastname' => 'Garutti',
            'rg' => $faker->rg,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('drivers')->insert([
            'user_id' => 1,
            'username' => 'driver2',
            'name' => 'James',
            'lastname' => 'Cotil 2005',
            'rg' => $faker->rg,
            'password' => bcrypt('123abc'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
