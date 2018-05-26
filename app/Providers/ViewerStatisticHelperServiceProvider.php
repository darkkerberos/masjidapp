<?php

namespace MasjidApp\Providers;

use Illuminate\Support\ServiceProvider;

class ViewerStatisticHelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        require_once app_path() . '/Helpers/ViewerStatistic.php';
    }
}
