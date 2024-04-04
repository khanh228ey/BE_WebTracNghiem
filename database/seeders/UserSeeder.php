<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
            $role_id = $i <= 4 ? 2 : 1; // Gán role id là 1 cho 3 người đầu tiên, và role id là 2 cho 2 người còn lại
            DB::table('users')->insert([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@gmail.com',
                'password' => Hash::make('password'), // Mật khẩu mặc định là 'password', bạn có thể thay đổi nếu cần
                'vaitro' => $role_id,
                // Các trường khác của bảng người dùng nếu có
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
