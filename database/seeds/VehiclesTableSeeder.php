<?php

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicles')->insert([
            'user_id' => 1,
            'placa' => 'EDF-7508',
            'firebasegps' => '-LMQDNwUboUGHl0t4F5D',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'active' => true,
            'last_payment' => date("Y-m-d H:i:s", strtotime('-1 month', strtotime(date("Y-m-10 00:00:00"))))
        ]);
    }
}
