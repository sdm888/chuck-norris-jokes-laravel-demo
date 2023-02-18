<?php

declare(strict_types=1);

namespace Sdm888\ChuckNorrisJokesLaravel\Tests;

use Orchestra\Testbench\TestCase;
use Sdm888\ChuckNorrisJokesLaravel\Facades\ChuckNorrisJokes;
use Sdm888\ChuckNorrisJokesLaravel\Providers\ChuckNorrisJokesServiceProvider;

class RouteTest extends TestCase
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
    public function the_route_can_be_accessed()
    {
        ChuckNorrisJokes::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn($value = 'some joke');

        $this
            ->get('/chuck-norris-joke')
            ->assertStatus(200)
            ->assertViewIs('chuck-norris::joke')
            ->assertViewHas('joke', $value);
    }
}
