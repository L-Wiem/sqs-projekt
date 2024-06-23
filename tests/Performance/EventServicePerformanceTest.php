<?php

namespace Tests\Performance;

use App\Services\EventService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\User;

class EventServicePerformanceTest extends TestCase
{
    // this is needed for test with db access
    use DatabaseMigrations;

    /**
     * Creation of 1000 events
     */
    public function test_createEventPerformance(): void
    {
        $this->createUserAndLogin();
        $numEvents = 1000;
        $events = [];
        $start = microtime(true);

        for ($i = 1; $i <= $numEvents; $i++) {
            //create a new event
            $data = [
                'title' => 'Test Event title ' . $i,
                'description' => 'Test Event description ' . $i,
                'capacity' => 10
            ];
            $eventService = new EventService();
            $events[$i] = $eventService->createEvent($data);
        }

        $end = microtime(true);
        $elapsed = $end - $start;

        echo "Time taken to save $numEvents events: $elapsed seconds\n";

        // Asserts to ensure events were saved
        $this->assertCount($numEvents, $events);
    }

    private function createUserAndLogin()
    {
        $user = User::factory()->create([
            'email' => bin2hex(random_bytes(8)) . '@test.com']);
        $this->actingAs($user);
        return $user;
    }
}
