<?php

namespace Tests\Feature;

use App\Models\Genre;
use Tests\TestCase;

class MoviePagesTest extends TestCase
{
    /**
     * @return void
     */
    public function testGenreIndexPage(): void
    {
        $response = $this->get(route('genre.index'));

        $response->assertStatus(200);
    }
    /**
     * @return void
     */
    public function testGenreCreatePage(): void
    {
        $response = $this->get(route('genre.create'));
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testGenreCreateWithInvalidData()
    {
        $response = $this->post(route('genre.store'), [
            'title' => 'Test Genre',
        ]);
        $response->assertSessionHasErrors(['description']);
        $this->assertEquals(302, $response->getStatusCode());
    }

    /**
     * @return void
     */
    public function testNewGenreStorePage()
    {
        $response = $this->post(route('genre.store'), [
            'title' => 'Test Genre',
            'description' => 'Test Genre description',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertSessionHasAll(['success']);
        $this->assertEquals(302, $response->getStatusCode());

        $this->assertDatabaseHas('genres', ['title' => 'Test Genre']);
    }

    public function testGenreEditPage()
    {
        $genre = Genre::factory()->create(['title' => 'test genre edit']);

        $response = $this->get(route('genre.edit', $genre->id));

        $response->assertStatus(200);
        $response->assertViewIs('genre.edit');
        $response->assertViewHas('genre', $genre);
    }

    public function testGenreUpdatePage()
    {
        $genre = Genre::factory()->create(['title' => 'test genre update']);
        $data = [
            'title' => 'test genre updated',
            'description' => 'Genre 2 description',
        ];
        $response = $this->put(route('genre.update', $genre->id), $data);

        $response->assertSessionHasNoErrors();
        $response->assertSessionHasAll(['success']);
        $this->assertEquals(302, $response->getStatusCode());

        $this->assertDatabaseHas('genres', ['title' => 'test genre updated']);
    }

    public function testGenreDeleteOperation()
    {
        $genre = Genre::factory()->create([
            'title' => 'test genre delete',
            'description' => 'Genre 2 description',
        ]);

        $response = $this->delete(route('genre.destroy', $genre->id));

        $response->assertSessionHasNoErrors();
        $response->assertSessionHasAll(['success']);
        $this->assertEquals(302, $response->getStatusCode());

        $this->assertDatabaseMissing('genres', ['title' => 'test genre delete']);
    }
}
