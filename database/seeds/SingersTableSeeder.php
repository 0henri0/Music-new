<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SingersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 30;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('singers')->insert([
                'name' => $faker->name,
                'country_id'=>rand(1,5),
                'avatar' => $faker->imageUrl($width = 640, $height = 480),
                'introduction'=>$faker->sentence($nbWords = 10, $variableNbWords = true),
                'created_at'=> Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
        }
    }
}
