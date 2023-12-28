<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */ 
    public function run(): void
    {
        $faker = Faker::create();

        foreach(range(1, 100) as $index) {
            DB::table('products')->insert([
                'name' => $faker->city,
                'detail' => $faker->paragraph($nb = 2),
                'price' => $faker->numberBetween($min = 500, $max = 9999999),
                'stock' => $faker->numberBetween($min = 100, $max = 1000)
            ]);
        }
    }
}
