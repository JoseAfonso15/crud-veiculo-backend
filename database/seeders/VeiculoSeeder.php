<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class VeiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('veiculos')->insert([
                'placa' => strtoupper($faker->regexify('[A-Z0-9]{7}')),  
                'chassi' => strtoupper($faker->regexify('[A-Z0-9]{17}')),  
                'renavam' => $faker->regexify('[0-9]{11}'),  
                'modelo' => $faker->word,
                'marca' => $faker->word,
                'ano' => $faker->numberBetween(1900, date('Y')),
            ]);
        }
    }
}
