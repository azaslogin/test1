<?php

namespace Tests\Feature;

use App\Models\Movie;
use App\Models\User;
use Tests\TestCase;

class MoviePagesTest extends TestCase
{
    /**
     * @return void
     */
    public function testMovieIndexPage(): void
    {

        $response = $this->get(route('movie.index'));

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testMovieCreatePage(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get(route('movie.create'));

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testMovieCreateWithInvalidData()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->post(route('movie.store'), [
                'title' => 'Test Movie',
            ]);

        $response->assertSessionHasErrors(['description', 'year', 'duration']);
        $this->assertEquals(302, $response->getStatusCode());
    }

    /**
     * @return void
     */
    public function testNewMovieStorePage()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->post(route('movie.store'), [
                'title' => 'Test Movie',
                'description' => 'Test Movie description',
                'year' => '2023',
                'duration' => '2:30:00',
                'genre-id' => [1],
                'country-id' => [2],
            ]);

        $response->assertSessionHasNoErrors();
        $response->assertSessionHasAll(['success']);
        $this->assertEquals(302, $response->getStatusCode());

        $this->assertDatabaseHas('movies', ['title' => 'Test Movie']);
    }

    public function testMovieEditPage()
    {
        $user = User::factory()->create();
        $movie = Movie::factory()->create(['title' => 'test movie edit']);

        $response = $this->actingAs($user)
            ->get(route('movie.edit', $movie->id));

        $response->assertStatus(200);
        $response->assertViewIs('movie.edit');
        $response->assertViewHas('movie', $movie);
    }

    public function testMovieUpdatePage()
    {
        $movie = Movie::factory()->create(['title' => 'test movie update']);
        $data = [
            'title' => 'test movie updated',
            'description' => 'Movie 2 description',
            'year' => '2023',
            'duration' => '2:30:00',
            'genre-id' => [1],
            'country-id' => [2],
        ];
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->put(route('movie.update', $movie->id), $data);

        $response->assertSessionHasNoErrors();
        $response->assertSessionHasAll(['success']);
        $this->assertEquals(302, $response->getStatusCode());

        $this->assertDatabaseHas('movies', ['title' => 'test movie updated']);
    }

    public function testMovieDeleteOperation()
    {
        $movie = Movie::factory()->create([
            'title' => 'test movie delete',
            'description' => 'Movie 2 description',
            'year' => '2023',
            'duration' => '2:30:00',
        ]);
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->delete(route('movie.destroy', $movie->id));

        $response->assertSessionHasNoErrors();
        $response->assertSessionHasAll(['success']);
        $this->assertEquals(302, $response->getStatusCode());

        $this->assertDatabaseMissing('movies', ['title' => 'test movie delete']);
    }
}
