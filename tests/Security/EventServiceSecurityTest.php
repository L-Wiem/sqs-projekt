<?php

namespace Tests\Security;

use App\Services\EventService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\User;

class EventServiceSecurityTest extends TestCase
{
    // this is needed for test with db access
    use DatabaseMigrations;

    /**
     * test Cross-Site Scripting (XSS)
     */
    public function test_createEventXSS(): void
    {
        $this->createUserAndLogin();
        //create a new event
        $data = ['title' => "<script>alert('XSS');</script>", 'description' => 'Test Event description', 'capacity' => 10];
        $eventService = new EventService();
        $event = $eventService->createEvent($data);

        // Act: fetch the created event by its ID
        $testEvent = $eventService->fetchEvent($event->id);

        // Assert: ensure the fetched event is not null and matches the created event
        $this->assertNotNull($testEvent);
        $this->assertNotEquals($data['title'], $testEvent->title);
        $this->assertEquals('alert(&#039;XSS&#039;);', $testEvent->title);
    }

    /**
     * Test SQL Injection
     */
    public function test_createEventSQLInjection(): void
    {
        $this->createUserAndLogin();
        //create a new event
        $data = ['title' => "' OR '1'='1", 'description' => 'Test Event description', 'capacity' => 10];
        $eventService = new EventService();
        $event = $eventService->createEvent($data);

        // Act: fetch the created event by its ID
        $testEvent = $eventService->fetchEvent($event->id);

        // Assert: ensure the fetched event is not null and matches the created event
        $this->assertNotNull($testEvent);
        $this->assertNotEquals($data['title'], $testEvent->title);
        $this->assertEquals('&#039; OR &#039;1&#039;=&#039;1', $testEvent->title);
    }

    private function createUserAndLogin()
    {
        $user = User::factory()->create([
            'email' => bin2hex(random_bytes(8)) . '@test.com']);
        $this->actingAs($user);
        return $user;
    }
}
