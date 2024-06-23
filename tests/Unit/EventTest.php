<?php

namespace Tests\Unit;
use App\Models\Event;
use PHPUnit\Framework\TestCase;

class EventTest extends TestCase
{
    /** @test */
    public function it_fetches_an_event_by_id()
    {
        // Arrange: Create a test event
        $event = Event::factory()->create();

        // Act: Call the fetchEvent method
        $fetchedEvent = $this->fetchEvent($event->id);

        // Assert: Check if the fetched event matches the created event
        $this->assertInstanceOf(Event::class, $fetchedEvent);
        $this->assertEquals($event->id, $fetchedEvent->id);
    }

    // The fetchEvent method for testing
    public function fetchEvent($id)
    {
        return Event::find($id);
    }
}
