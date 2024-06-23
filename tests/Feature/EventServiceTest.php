<?php

namespace Tests\Feature;

use App\Services\EventService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class EventServiceTest extends TestCase
{
    // this is needed for test with db access
    use DatabaseMigrations;

    //test to assure that an event is correctly fetched from the database
    public function test_fetchEvent()
    {
        //create a new event
        $data = ['title' => 'Test Event title', 'description' => 'Test Event description'];
        $eventService = new EventService();
        $event = $eventService->createEvent($data);

        // Act: fetch the created event by its ID
        $testEvent = $eventService->fetchEvent($event->id);

        // Assert: ensure the fetched event is not null and matches the created event
        $this->assertNotNull($testEvent);
        $this->assertEquals($data['title'], $testEvent->title);
        $this->assertEquals($data['description'], $testEvent->description);
    }
    public function test_fetchEvent_with_nonExistent_id()
    {
        // attempt to fetch an event with a non-existent ID
        $eventService = new EventService();
        $testEvent = $eventService->fetchEvent(999999);

        // check that the fetched event is null
        $this->assertNull($testEvent);
    }
    public function test_fetchEvents()
    {
        $dataOne = ['title' => 'Test 1', 'description' => 'Lorem ipsum'];
        $dataTwo = ['title' => 'Test 2', 'description' => 'Lorem ipsum2'];
        $eventService = new EventService();
        $eventOne = $eventService->createEvent($dataOne);
        sleep(1);
        $eventTwo = $eventService->createEvent($dataTwo);
        $testEvents = $eventService->fetchEvents();
        $this->assertCount(2, $testEvents);
        $testEventOne = $testEvents->items()[0];
        $testEventTwo = $testEvents->items()[1];
        $this->assertGreaterThan($testEventTwo->created_at, $testEventOne->created_at);
    }

    //test to assure that the data was persisted successfully
    public function test_persistEvent()
    {
        $data = ['title' => 'Test Event title', 'description' => 'Test Event description'];
        $eventService = new EventService();
        $event = $eventService->persistEvent($data);
        $this->assertNotNull($event);

        // load the persisted event from db and check its data
        $eventFromDB = $eventService->fetchEvent($event->id);
        $this->assertNotNull($eventFromDB);
        $this->assertEquals('Test Event title', $eventFromDB->title);
        $this->assertEquals('Test Event description', $eventFromDB->description);
        $this->assertNotNull($eventFromDB->created_at);
        $this->assertNotNull($eventFromDB->updated_at);
    }

    //test to assure that the data was deleted successfully
    public function test_deleteEvent_with_valid_data()
    {
        $data = ['title' => 'Test Event title', 'description' => 'Test Event description'];
        $eventService = new EventService();
        $event = $eventService->persistEvent($data);
        $this->assertNotNull($event);
        // delete the event with the deleteEvent function
        $eventService->deleteEvent($event->id);
        // try to load the event from DB and test that it does not exist anymore
        $eventFromDB = $eventService->fetchEvent($event->id);
        $this->assertNull($eventFromDB);
    }

    public function test_deleteEvent_with_invalid_id()
    {
        $this->expectExceptionObject(new \Exception('Event not found'));
        $eventService = new EventService();
        // delete the event with the deleteEvent function with unexisting event id , check there is an exception
        $eventService->deleteEvent(3456789098765678);
    }

}


