<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActorsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $this->visit('/auth/login')
        ->type("bob@eponge.fr","email")
        ->type("bobinette","password")
        ->press("Connexion");
//        ->followRedirects();
//        ->see("Simple")
//        ->visit("/admin/actors/index");
//        ->see("Actors Index");
    }



}
