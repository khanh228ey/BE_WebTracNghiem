<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KetQuaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 1; $i <= 3; $i++) {
            DB::table('ketqua')->insert([
                'socaudung' => 2 +$i,
                'sodiem' => 3+$i,
                'thoigianvaothi' => Carbon::now(),
                'thoigianlambai' => 30 + $i,
                'user_id' => $i,
                'dethi_id' => 1,
                // Các trường khác của bảng người dùng nếu có
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
