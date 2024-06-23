<?php

namespace Tests\Unit;

use App\Services\EventService;
use Tests\TestCase;

class EventServiceTest extends TestCase
{
    //test to assure that sanitizeData function works perfectly
    public function test_sanitizeData()
    {
        //create a new event
        $data = ['title' => "<script>alert('XSS');</script>", 'description' => "' OR '1'='1", 'capacity' => 10];
        $eventService = new EventService();
        $sanitizedData = $eventService->sanitizeData($data);

        $this->assertNotEquals($data['title'], $sanitizedData['title']);
        $this->assertNotEquals($data['description'], $sanitizedData['description']);
        $this->assertEquals('alert(&#039;XSS&#039;);', $sanitizedData['title']);
        $this->assertEquals('&#039; OR &#039;1&#039;=&#039;1', $sanitizedData['description']);
    }
}
