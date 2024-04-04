<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DateTime;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => 'user' . $i . '@stu.edu.vn',
                'vaitro' => random_int(1, 2),
                'email_verified_at' => null,
                'password' => bcrypt('abc123'),
                'remember_token' => null,
                'created_at'=>new DateTime()
            ]);
        }
    }
}
