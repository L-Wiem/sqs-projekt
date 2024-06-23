<?php

namespace Tests\Feature;

use App\Services\EventService;
use App\Services\ReservationService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Tests\TestCase;
use App\Models\User;

class ReservationServiceTest extends TestCase
{
    // this is needed for test with db access
    use DatabaseMigrations;

    public function test_reserveEventForConnectedUserSuccess()
    {
        $user = $this->createUserAndLogin();
        $event = $this->createAnEvent(10);
        $reservationService = new ReservationService();
        $reservationService->reserveEventForConnectedUser($event->id);

        $fetchReservation = $reservationService->getConnectedUserReservationForAnEvent($event->id);
        $countReservations = $reservationService->countEventReservations($event->id);

        // Assert: ensure the fetched event is not null and matches the created event
        $this->assertNotNull($fetchReservation);
        $this->assertEquals(1, $countReservations);
        $this->assertEquals($user->id, $fetchReservation->user_id);
        $this->assertEquals($event->id, $fetchReservation->event_id);
    }

    public function test_reserveEventForConnectedUserForNonExistingEvent()
    {
        $this->expectExceptionObject(new HttpException(404, 'Event not found'));
        $reservationService = new ReservationService();
        $reservationService->reserveEventForConnectedUser(8989898989);
    }

    public function test_reserveEventForConnectedUserWithAlreadyReserved()
    {
        $this->expectExceptionObject(new \Exception('Event already reserved'));
        $this->createUserAndLogin();
        $event = $this->createAnEvent(10);
        $reservationService = new ReservationService();
        $reservationService->reserveEventForConnectedUser($event->id);
        //Second attempt to reserve the same event should throw an exception
        $reservationService->reserveEventForConnectedUser($event->id);
    }

    public function test_reserveEventForConnectedUserWithFullyBookedEvent()
    {
        $this->expectExceptionObject(new \Exception('Event is fully booked'));
        // Create a first user and act with it
        $this->createUserAndLogin();
        // Create an event with only 1 as capacity
        $event = $this->createAnEvent(1);
        $reservationService = new ReservationService();
        // Reserve the event for first user
        $reservationService->reserveEventForConnectedUser($event->id);
        // get count of reservations it should be 1
        $countReservations = $reservationService->countEventReservations($event->id);
        $this->assertEquals(1, $countReservations);
        // Create a second user and act with it
        $this->createUserAndLogin();
        //Second attempt to reserve the same event should throw an exception as the event is fully booked
        $reservationService->reserveEventForConnectedUser($event->id);
    }

    private function createUserAndLogin()
    {
        $user = User::factory()->create([
            'email' => bin2hex(random_bytes(8)) . '@test.com'
        ]);
        $this->actingAs($user);
        return $user;
    }

    private function createAnEvent(int $capacity)
    {
        //create a new event
        $data = [
            'title' => 'Test Event title',
            'description' => 'Test Event description',
            'capacity' => $capacity
        ];
        $eventService = new EventService();
        return $eventService->createEvent($data);
    }
}
