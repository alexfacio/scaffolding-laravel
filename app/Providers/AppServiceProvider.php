<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\CronJobs\CronJobsController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Custom validations
        Validator::resolver(function($translator, $data, $rules, $messages)
        {
            return new \App\Providers\CustomValidatorServiceProvider($translator, $data, $rules, $messages);
        });

        // Tareas cron del controlador CronJobscontroller
        \Event::listen('cron.collectJobs', function() {
            $cron = new CronJobsController;
            $cron->iniciar=false;
            $cron->run();
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
