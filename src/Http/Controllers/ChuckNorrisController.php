<?php

declare(strict_types=1);

namespace Sdm888\ChuckNorrisJokesLaravel\Http\Controllers;

use Sdm888\ChuckNorrisJokesLaravel\Facades\ChuckNorrisJokes;

class ChuckNorrisController
{
    public function __invoke()
    {
        return view('chuck-norris::joke', [
            'joke' => ChuckNorrisJokes::getRandomJoke(),
        ]);
    }
}
