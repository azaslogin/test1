<?php

namespace Tests\Feature;

use App\Models\Country;
use PHPUnit\Framework\Constraint\Count;
use Tests\TestCase;

class CountryPagesTest extends TestCase
{
    /**
     * @return void
     */
    public function testCountryIndexPage(): void
    {
        $response = $this->get(route('country.index'));

        $response->assertStatus(200);
    }
    /**
     * @return void
     */
    public function testCountryCreatePage(): void
    {
        $response = $this->get(route('country.create'));
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testCountryCreateWithInvalidData()
    {
        $response = $this->post(route('country.store'), [
            'title' => 'Test Country',
        ]);
        $response->assertSessionHasErrors(['description']);
        $this->assertEquals(302, $response->getStatusCode());
    }

    /**
     * @return void
     */
    public function testNewCountryStorePage()
    {
        $response = $this->post(route('country.store'), [
            'title' => 'Test Country',
            'description' => 'Test Country description',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertSessionHasAll(['success']);
        $this->assertEquals(302, $response->getStatusCode());

        $this->assertDatabaseHas('countries', ['title' => 'Test Country']);
    }

    public function testCountryEditPage()
    {
        $country = Country::factory()->create(['title' => 'test country edit']);

        $response = $this->get(route('country.edit', $country->id));

        $response->assertStatus(200);
        $response->assertViewIs('country.edit');
        $response->assertViewHas('country', $country);
    }

    public function testCountryUpdatePage()
    {
        $country = Country::factory()->create(['title' => 'test country update']);
        $data = [
            'title' => 'test country updated',
            'description' => 'Country 2 description',
        ];
        $response = $this->put(route('country.update', $country->id), $data);

        $response->assertSessionHasNoErrors();
        $response->assertSessionHasAll(['success']);
        $this->assertEquals(302, $response->getStatusCode());

        $this->assertDatabaseHas('countries', ['title' => 'test country updated']);
    }

    public function testCountryDeleteOperation()
    {
        $country = Country::factory()->create([
            'title' => 'test country delete',
            'description' => 'Country 2 description',
        ]);

        $response = $this->delete(route('country.destroy', $country->id));

        $response->assertSessionHasNoErrors();
        $response->assertSessionHasAll(['success']);
        $this->assertEquals(302, $response->getStatusCode());

        $this->assertDatabaseMissing('countries', ['title' => 'test country delete']);
    }
}
