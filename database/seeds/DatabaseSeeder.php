<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(VehiclesTableSeeder::class);
        $this->call(ShiftsTableSeeder::class);
        $this->call(ShiftStudentTableSeeder::class);
        $this->call(DriversTableSeeder::class);
        $this->call(VehicleDriverTableSeeder::class);
        $this->call(PlansTableSeeder::class);
    }
}
