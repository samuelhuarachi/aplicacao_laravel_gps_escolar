<?php

use Illuminate\Database\Seeder;

class ShiftStudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shift_student')->insert([
            'shift_id' => 1,
            'student_id' => 1,
        ]);
        
        DB::table('shift_student')->insert([
            'shift_id' => 1,
            'student_id' => 2,
        ]);

        DB::table('shift_student')->insert([
            'shift_id' => 1,
            'student_id' => 3,
        ]);

        DB::table('shift_student')->insert([
            'shift_id' => 1,
            'student_id' => 4,
        ]);
        
        //--------
        DB::table('shift_student')->insert([
            'shift_id' => 2,
            'student_id' => 1,
        ]);
        
        DB::table('shift_student')->insert([
            'shift_id' => 2,
            'student_id' => 2,
        ]);

        DB::table('shift_student')->insert([
            'shift_id' => 2,
            'student_id' => 3,
        ]);

        DB::table('shift_student')->insert([
            'shift_id' => 2,
            'student_id' => 4,
        ]);

        //-------- tarde 1
        DB::table('shift_student')->insert([
            'shift_id' => 3,
            'student_id' => 5,
        ]);
        
        DB::table('shift_student')->insert([
            'shift_id' => 3,
            'student_id' => 6,
        ]);

        DB::table('shift_student')->insert([
            'shift_id' => 3,
            'student_id' => 7,
        ]);

        DB::table('shift_student')->insert([
            'shift_id' => 3,
            'student_id' => 8,
        ]);

        //-------- tarde 2
        DB::table('shift_student')->insert([
            'shift_id' => 4,
            'student_id' => 5,
        ]);
        
        DB::table('shift_student')->insert([
            'shift_id' => 4,
            'student_id' => 6,
        ]);

        DB::table('shift_student')->insert([
            'shift_id' => 4,
            'student_id' => 7,
        ]);

        DB::table('shift_student')->insert([
            'shift_id' => 4,
            'student_id' => 8,
        ]);
    }
}
