<?php

namespace Sdm888\ChuckNorrisJokesLaravel;

use Illuminate\Support\ServiceProvider;
use Sdm888\ChuckNorrisJokes\JokeFactory;

class ChuckNorrisJokesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('chuck-norris-jokes', function () {
            return new JokeFactory();
        });
    }
}
