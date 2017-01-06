<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MovieTest extends TestCase {
    /**
     * A basic functional test example.
     *
     * @return void
     */


    public function testDatabase() {
        //$movie = factory(App\Movie::class, 40)->create();
        $event = factory(App\Event::class, 40)->create();
        //$user = factory(App\User::class, 1)->create();
    }
}
