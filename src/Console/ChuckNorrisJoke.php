<?php

namespace Sdm888\ChuckNorrisJokesLaravel\Console;

use Illuminate\Console\Command;
use Sdm888\ChuckNorrisJokes\JokeFactory;

class ChuckNorrisJoke extends Command
{
    protected $signature = 'chuck-norris-joke';

    protected $description = 'Output a funny Chuck Norris joke.';

    protected JokeFactory $jokeFactory;

    public function __construct(JokeFactory $jokeFactory)
    {
        parent::__construct();
        $this->jokeFactory = $jokeFactory;
    }

    public function handle()
    {
        $this->info($this->jokeFactory->getRandomJoke());
    }
}
