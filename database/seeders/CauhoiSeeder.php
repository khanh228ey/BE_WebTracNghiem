<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CauhoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 1; $i <= 10; $i++) {
            $dethi_id = $i <= 5 ? 1 : 2;
            DB::table('cauhoi')->insert([
                'noidung' => 'Cau hoi thứ ' . $i,
                'dap_an_a' => "dap an a" . $i,
                'dap_an_b' => "dap an a" . $i,
                'dap_an_c' => "dap an a" . $i,
                'dap_an_d' => "dap an a" . $i,
                'dap_an_dung' => "A",
                'dethi_id' => $dethi_id,
                // Các trường khác của bảng người dùng nếu có
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
