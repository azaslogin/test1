<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Country;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CountryPagesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test index method of CountryController.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/country');
        $response->assertStatus(200);
        $response->assertViewIs('country.index');
    }

    /**
     * Test store method of CountryController.
     *
     * @return void
     */
    public function testStore()
    {
        $data = [
            'title' => 'Test title',
            'description' => 'Test description',
        ];

        $response = $this->post('/country', $data);
        $response->assertStatus(302);
        $response->assertRedirect('/country');

        $this->assertDatabaseHas('country', $data);
    }

    /**
     * Test update method of CountryController.
     *
     * @return void
     */
    public function testUpdate()
    {
        $country = Country::factory()->create();
        $data = [
            'title' => 'Updated title',
            'description' => 'Updated description',
        ];

        $response = $this->put('country.update' . $country->id, $data);
        $response->assertStatus(302);
        $response->assertRedirect('country.update' . $country->id);

        $this->assertDatabaseHas('country', $data);
    }

    /**
     * Test destroy method of CountryController.
     *
     * @return void
     */
    public function testDestroy()
    {
        $country = Country::factory()->create();

        $response = $this->delete('country.destroy' . $country->id);
        $response->assertStatus(302);
        $response->assertRedirect('country.destroy');

        $this->assertDatabaseMissing('countries', ['id' => $country->id]);
    }
}
