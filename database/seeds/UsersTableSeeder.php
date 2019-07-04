<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Faker\Factory::create();

        for ($x = 1; $x <= 10; $x++) :
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'mobile' => 9893694008 + $x,
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            ]);
        endfor;
    }
}
