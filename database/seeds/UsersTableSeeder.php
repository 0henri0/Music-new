<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 50;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => $faker->password,
                'avatar' => $faker->imageUrl($width = 640, $height = 480),
                'introduction'=>$faker->sentence($nbWords = 6, $variableNbWords = true),
                'created_at'=> Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
        }
    }
}