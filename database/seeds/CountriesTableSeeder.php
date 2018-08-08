<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $data = array('Nhật Bản','Hàn Quốc','Việt Nam','Âu Mỹ','Trung Quốc');

        for ($i = 0; $i < count($data); $i++) {
            DB::table('countries')->insert([
                'id'=>$i+1,
                'name' => $data[$i],
                'created_at'=> Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
        }
    }
}
