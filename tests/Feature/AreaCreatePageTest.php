<?php

namespace Tests\Feature;

use App\Models\Areas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AreaCreatePageTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_page_shows_existing_areas_with_show_and_edit_buttons(): void
    {
        Areas::create(['name' => 'Sistemas']);

        $response = $this->get(route('area.create'));

        $response->assertOk()
            ->assertSee('Mostrar')
            ->assertSee('Editar')
            ->assertSee('Sistemas');
    }

    public function test_area_can_be_deleted(): void
    {
        $area = Areas::create(['name' => 'Sistemas']);

        $response = $this->delete(route('area.destroy', $area));

        $response->assertRedirect(route('area.create'));
        $this->assertDatabaseMissing('areas', ['id' => $area->id]);
    }
}
