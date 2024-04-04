<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DethiSeeder extends Seeder
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
            $trangthai = $i <= 2 ? 1 : 0;
            DB::table('dethi')->insert([
                'tendethi' => 'Đề thi số ' . $i,
                'thoigianthi' => 30 + $i,
                'thoigianbatdau' => Carbon::now(),
                'thoigianketthuc' => Carbon::now(),
                'soluongcauhoi' => 5,
                'trangthai' => $trangthai,
                'monhoc_id' => $i,
                'user_id' => 5,
                // Các trường khác của bảng người dùng nếu có
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
