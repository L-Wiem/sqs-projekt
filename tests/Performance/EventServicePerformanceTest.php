<?php

namespace Tests\Performance;

use App\Services\EventService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class EventServicePerformanceTest extends TestCase
{
    // this is needed for test with db access
    use DatabaseMigrations;
    /**
     * Creation of 1000 events
     */
    public function test_createEventPerformance(): void
    {
        $numEvents = 1000;
        $events = [];
        $start = microtime(true);

        for ($i = 1; $i <= $numEvents; $i++) {
            //create a new event
            $data = [
                'title' => 'Test Event title ' . $i,
                'description' => 'Test Event description ' . $i
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
}
