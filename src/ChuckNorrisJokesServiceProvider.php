<?php

namespace Sdm888\ChuckNorrisJokesLaravel;

use Illuminate\Support\ServiceProvider;
use Sdm888\ChuckNorrisJokes\JokeFactory;
use Sdm888\ChuckNorrisJokesLaravel\Console\ChuckNorrisJoke;

class ChuckNorrisJokesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ChuckNorrisJoke::class,
            ]);
        }
    }

    public function register()
    {
        $this->app->bind('chuck-norris-jokes', function () {
            return new JokeFactory();
        });
    }
}
