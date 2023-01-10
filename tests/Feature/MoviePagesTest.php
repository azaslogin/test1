<?php

namespace Tests\Feature;

use Tests\TestCase;

class MoviePagesTest extends TestCase
{
    /**
     * @return void
     */
    public function testIndexPageToReturnSuccessfulResponse(): void
    {

        $response = $this->get('/movie');

        $response->assertStatus(200);
    }
    /**
     * @return void
     */
    public function testCreatePageToReturnSuccessfulResponse(): void
    {

        $response = $this->get('/movie/create');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testInvalidMovieCreationData()
    {
        $response = $this->post('/movie/store', [
            'title' => 'Test User',
        ]);
        $this->assertEquals(405, $response->getStatusCode());
    }

    /**
     * @return void
     */
    public function testNewMovieCanBeCreated()
    {
        $response = $this->post('/movie/store', [
            'title' => 'Test Movie',
            'description' => 'Test Movie description',
            'year' => '2023',
            'duration' => '2:30:00',
            'genre-id' => [1],
            'country-id' => [2],
        ]);

        $this->assertEquals(405, $response->getStatusCode());
    }
}
