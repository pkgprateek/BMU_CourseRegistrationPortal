<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $strings = ["CSE", "CSC", "ECE", "ME", "CE"];
        $id = [14, 15, 16];
        $count = count($strings) - 1;
        foreach (range(1,500) as $index) {
            $yr = $id[rand(0, 2)];
            DB::table('students')->insert([
                'registration_id' => $yr.'B'.str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT),
                'name' => $faker->name,
                'email' => $faker->email,
                'batch_year' => '20'.$yr,
                'specialization' => $strings[rand(0, $count)],
                'contact' => $faker->phoneNumber
            ]);
        }
    }
}
