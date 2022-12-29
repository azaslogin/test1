<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageTest extends TestCase
{

    use RefreshDatabase;

    protected bool $seed = true;

    /**
     * @return void
     */
    public function testHomePageToReturnSuccessfulResponse(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testAboutIndexPageToReturnSuccessfulResponse(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testMovieIndexPageToReturnSuccessfulResponse(): void
    {

        $response = $this->get('/movie');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testGenreIndexPageToReturnSuccessfulResponse(): void
    {
        $response = $this->get('/genre');

        $response->assertStatus(200);
    }
}
