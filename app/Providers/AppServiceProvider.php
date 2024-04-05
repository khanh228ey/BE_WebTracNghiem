<?php

namespace App\Providers;

use App\Models\Dethi;
use App\Models\Monhoc;
use App\Models\User;
use Illuminate\Support\Facades\View;;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        $countDeThi = Dethi::count();
        $countSinhVien = User::where('vaitro',2)->count();
        $countGiaoVien = User::where('vaitro',1)->count();
        $countMonHoc = Monhoc::count();
        View::share([
            'sodethi' => $countDeThi,
            'sosinhvien'  => $countSinhVien,
            'sogiaovien' => $countGiaoVien,
            'somonhoc' => $countMonHoc,
        ]);
    }
}
