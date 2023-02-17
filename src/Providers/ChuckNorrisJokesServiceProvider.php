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
        ]);

        Route::get('/chuck-norris-joke', ChuckNorrisController::class);
    }

    public function register()
    {
        $this->app->bind('chuck-norris-jokes', function () {
            return new JokeFactory();
        });
    }
}
