<?php

namespace Sdm888\ChuckNorrisJokesLaravel\Console;

use Illuminate\Console\Command;
use Sdm888\ChuckNorrisJokes\JokeFactory;
use Sdm888\ChuckNorrisJokesLaravel\Facades\ChuckNorrisJokes;

class ChuckNorrisJoke extends Command
{
    protected $signature = 'chuck-norris-joke';

    protected $description = 'Output a funny Chuck Norris joke.';

    protected JokeFactory $jokeFactory;

    public function handle()
    {
        $this->info(ChuckNorrisJokes::getRandomJoke());
    }
}
