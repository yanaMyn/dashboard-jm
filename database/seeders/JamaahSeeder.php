<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JamaahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 20; $i++) {
            DB::table('jamaah')->insert([
                'name' => $faker->name,
                'status' => $faker->randomElement(['Belum Menikah', 'Menikah', 'Duda', 'Janda']),
                'address' => $faker->address,
                'phone_number' => $faker->phoneNumber,
                'note' => $faker->text(),
                'gender' => $faker->randomElement(['Laki-Laki', 'Perempuan']),
                'generus' => $faker->randomElement(['Dewasa', 'Senior', 'Muda-Mudi', 'Praremaja', 'Caberawit']),
            ]);
        }
    }
}
