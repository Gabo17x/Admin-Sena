<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AreasStoreTest extends TestCase
{
    use RefreshDatabase;
    public function test_store_returns_the_created_area_as_json(): void
    {
        $response = $this->postJson(route('area.store'), [
            'name' => 'Sistemas',
        ]);

        $response->assertStatus(201)
            ->assertJsonPath('name', 'Sistemas');
    }
}
