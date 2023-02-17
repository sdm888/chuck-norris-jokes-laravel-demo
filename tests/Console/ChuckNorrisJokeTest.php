<?php

declare(strict_types=1);

namespace Sdm888\ChuckNorrisJokesLaravel\Tests\Console;

use Illuminate\Support\Facades\Artisan;
use Orchestra\Testbench\TestCase;
use Sdm888\ChuckNorrisJokesLaravel\ChuckNorrisJokesServiceProvider;
use Sdm888\ChuckNorrisJokesLaravel\Facades\ChuckNorrisJokes;

class ChuckNorrisJokeTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ChuckNorrisJokesServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'ChuckNorris' => ChuckNorrisJokes::class,
        ];
    }

    /** @test */
    public function the_console_command_returns_a_joke()
    {
        $this->withoutMockingConsoleOutput();

        ChuckNorrisJokes::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn('some joke');

        $this->artisan('chuck-norris-joke');

        $output = Artisan::output();

        $this->assertSame('some joke' . PHP_EOL, $output);
    }
}
