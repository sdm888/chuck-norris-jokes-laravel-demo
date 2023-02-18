<?php

namespace Sdm888\ChuckNorrisJokesLaravel\Tests\Database;

use Orchestra\Testbench\TestCase;
use Sdm888\ChuckNorrisJokesLaravel\Facades\ChuckNorrisJokes;
use Sdm888\ChuckNorrisJokesLaravel\Models\Joke;
use Sdm888\ChuckNorrisJokesLaravel\Providers\ChuckNorrisJokesServiceProvider;

class DatabaseTest extends TestCase
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

    protected function getEnvironmentSetUp($app)
    {
        include_once __DIR__ . '/../../src/database/migrations/create_jokes_table.php.stub';

        (new \CreateJokesTable)->up();
    }

    /** @test */
    public function it_can_access_the_database()
    {
        $joke = new Joke();
        $joke->joke = $value = 'this is funny';
        $joke->save();

        $newJoke = Joke::find($joke->id);

        $this->assertSame($newJoke->joke, $value);
    }
}
