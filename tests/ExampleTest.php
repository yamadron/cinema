<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase {
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample() {
        $this->visit('/')
            ->see('Laravel 5');
    }

    public function testDatabase() {
        $movie = factory(App\Movie::class, 10)->create();
        $event = factory(App\Event::class, 10)->create();
    }
}
