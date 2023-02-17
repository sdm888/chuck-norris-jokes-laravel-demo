<?php

namespace Sdm888\ChuckNorrisJokesLaravel\Facades;

use Illuminate\Support\Facades\Facade;

class ChuckNorrisJokes extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return 'chuck-norris-jokes';
    }
}
