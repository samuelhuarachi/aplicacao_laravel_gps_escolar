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
        $this->call(ClientsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(ShiftsTableSeeder::class);
        $this->call(ShiftStudentTableSeeder::class);
    }
}
