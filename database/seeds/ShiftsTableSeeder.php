<?php

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shifts')->insert([
            'vehicle_id' => 1,
            'name' => 'Manhã Ida',
            'active' => true,
            'start_at' => '6:30:00',
            'finish_at' => '7:00:00',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('shifts')->insert([
            'vehicle_id' => 1,
            'name' => 'Manhã Busca',
            'active' => true,
            'start_at' => '11:25:00',
            'finish_at' => '12:10:00',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('shifts')->insert([
            'vehicle_id' => 1,
            'name' => 'Tarde Ida',
            'active' => true,
            'start_at' => '12:25:00',
            'finish_at' => '13:10:00',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('shifts')->insert([
            'vehicle_id' => 1,
            'name' => 'Tarde Busca',
            'active' => true,
            'start_at' => '17:25:00',
            'finish_at' => '18:45:00',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
