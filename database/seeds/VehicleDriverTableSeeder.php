<?php

use Illuminate\Database\Seeder;

class VehicleDriverTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('driver_vehicle')->insert([
            'vehicle_id' => 1,
            'driver_id' => 1,
        ]);

        DB::table('driver_vehicle')->insert([
            'vehicle_id' => 1,
            'driver_id' => 2,
        ]);
    }
}
