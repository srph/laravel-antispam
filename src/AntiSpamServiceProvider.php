<?php

namespace Srph\LaravelAntiSpam;

use Illuminate\Support\ServiceProvider;
use Srph\AntiSpam\AntiSpam;

class ValidationServiceProvider extends ServiceProvider
{

    /**
     *
     */
    public function boot() {
        $app = $this->app;
        

        $app->make('validator')->extend('antispam', function($attribute, $value) use ($app) {
            $index = $app->make('request')->get('antispam_key', '');
            $questions = $config = $app->make('config');->get('package::questions');

            if ( !strlen($index) || !isset($questions[$index])) {
                return false;
            }

            return array_search($value, $questions[$index]) !== FALSE;
        });
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register() {
        $this->publishes(
            __DIR__. '/config/config.php', 'antispam'
        );

        $this->app->singleton(AntiSpam::class, function() {
            return new \AntiSpam(config('antispam'));
        });
    }
    
}