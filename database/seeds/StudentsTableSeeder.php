<?php

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('pt_BR');
        
        $i = 1;
        
        while($i <= 30) {
            DB::table('students')->insert([
                'client_id' => 1,
                'username' => $faker->username,
                'password' => bcrypt('123abc'),
                'name' => $faker->firstNameFemale,
                'lastname' => $faker->lastName,
                'age' => $faker->numberBetween(3,17),
                'gender' => 'Feminino',
                'phone' => (string)'(19) 3208-' . $faker->numberBetween(1000,9999),
                'cell_phone' => (string)'(19) 98317-' . $faker->numberBetween(1000,9999),
                'email' => $faker->email,
                'street' => $faker->streetName,
                'number' => $faker->numberBetween(10,1000),
                'neighborhood' => 'Jardim Santa Genebra',
                'zipcode' => (string)'13080-'.$faker->numberBetween(100,999),
                'city' => 'Campinas',
                'state' => 'SP',
                'fathers_firstname' => $faker->firstNameMale,
                'fathers_lastname' => $faker->lastName,
                'fathers_phone' => (string)'(19) 3208-' . $faker->numberBetween(1000,9999),
                'fathers_cell_phone' => (string)'(19) 98317-' . $faker->numberBetween(1000,9999),
                'mothers_firstname' => $faker->firstNameFemale,
                'mothers_lastname' => $faker->lastName,
                'mothers_phone' => (string)'(19) 3208-' . $faker->numberBetween(1000,9999),
                'mothers_cell_phone' => (string)'(19) 98317-' . $faker->numberBetween(1000,9999),
                'lat' => $faker->latitude(-90, 90),
                'lng' => $faker->longitude(-90, 90),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            $i++;
        }
    }
}
