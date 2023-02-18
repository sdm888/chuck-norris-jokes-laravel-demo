<?php

namespace Sdm888\ChuckNorrisJokesLaravel\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Sdm888\ChuckNorrisJokes\JokeFactory;
use Sdm888\ChuckNorrisJokesLaravel\Console\ChuckNorrisJoke;
use Sdm888\ChuckNorrisJokesLaravel\Http\Controllers\ChuckNorrisController;

class ChuckNorrisJokesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ChuckNorrisJoke::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'chuck-norris');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/chuck-norris'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/../config/chuck-norris-joke.php' => base_path('config/chuck-norris-joke.php')
        ], 'config');

        if (!class_exists('CreateJokesTable')) {
            $this->publishes([
                __DIR__ . './../database/create_jokes_table.php.stub' =>
                    database_path('migrations/' . date('Y_m_d_His', time()) . '_create_jokes_table.php')
            ], 'migrations');
        }

        $config = $this->app->make('config');

        Route::get(
            $config->get('chuck-norris-joke.route'),
            ChuckNorrisController::class
        );
    }

    public function register()
    {
        $this->app->bind('chuck-norris-jokes', function () {
            return new JokeFactory();
        });

        $this->mergeConfigFrom(
            __DIR__ . '/../config/chuck-norris-joke.php',
            'chuck-norris-joke'
        );
    }
}
