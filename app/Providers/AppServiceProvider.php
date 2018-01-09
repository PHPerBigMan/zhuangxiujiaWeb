<?php

namespace App\Providers;

use App\Models\ContentModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use App\Models\BannerModel;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       // 将session中的user注入到视图
        view()->composer('*', function ($view) {
            $view
                ->with('auth', \Session::get('user'))
		        ->with('video',BannerModel::where('type','video')->value('banner_url'))
                ->with('phone',ContentModel::value('phone'))
                ->with('ScrollTitle',ContentModel::value('title'))
                ->with('qrcode',ContentModel::value('qrcode'));
           });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
