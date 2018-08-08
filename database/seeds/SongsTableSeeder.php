<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 500;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('songs')->insert([
                'name' => $faker->name,
                'user_id'=>rand(1, 50),
                'url'=>'upload/song/1533266404335684112_Dung-Nhu-Thoi-Quen-JayKii-Sara-Luu.mp3',
                'avatar' => $faker->imageUrl($width = 640, $height = 480),
                'lyrics'=>$faker->sentence($nbWords = 60, $variableNbWords = true),
                'view'=>rand(0,10000000),
                'download'=>rand(0,100000),
                'created_at'=> Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
        }
    }
}
