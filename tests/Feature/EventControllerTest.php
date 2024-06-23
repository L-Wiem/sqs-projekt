<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class EventControllerTest extends TestCase
{
    // this is needed for test with db access
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     */
    public function test_index(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_createEvent()
    {
        $response = $this->post('/events', [
            'title' => 'Test Event from EventControllerTest -test_createEvent title',
            'description' => 'Test Event from EventControllerTest - test_createEvent description',
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('events', [
            'title' => 'Test Event from EventControllerTest -test_createEvent title',
            'description' => 'Test Event from EventControllerTest - test_createEvent description',
        ]);
    }

}
