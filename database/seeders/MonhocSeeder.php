<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonhocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 1; $i <= 5; $i++) {
            DB::table('monhoc')->insert([
                'ten' => 'Monhoc ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
