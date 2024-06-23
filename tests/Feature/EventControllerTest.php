<?php

namespace Tests\Feature;

use App\Models\User;
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
        $user = User::factory()->create();
        $this->post('/login', ['email' => $user->email, 'password' => 'password',]);
        $this->assertAuthenticated();

        $this->post('/events/store', [
            'title' => 'Test Event from EventControllerTest -test_createEvent title',
            'description' => 'Test Event from EventControllerTest - test_createEvent description',
            'capacity' =>  10
        ]);

        $this->assertDatabaseHas('events', [
            'title' => 'Test Event from EventControllerTest -test_createEvent title',
            'description' => 'Test Event from EventControllerTest - test_createEvent description',
            'capacity' =>  10
        ]);
    }

}
