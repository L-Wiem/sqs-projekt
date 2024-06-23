<?php

namespace App\Services;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ReservationService
{
    /**
     * @return Reservation[]
     */
    public function getConnectedUserReservations()
    {
        return Reservation::where('user_id', Auth::id())->get();
    }

    /**
     * @param $eventId
     * @return void
     * @throws \Exception
     */
    public function reserveEventForConnectedUser($eventId)
    {
        // 1- check if the event does exist
        $eventService = new EventService();
        $event = $eventService->fetchEvent($eventId);
        if (null == $event) {
            return throw new HttpException(404, 'Event not found');
        }

        // 2- check if there is already an existing reservation for the event
        $existingReservation = $this->getConnectedUserReservationForAnEvent($eventId);
        if (null != $existingReservation) {
            return throw new \Exception('Event already reserved');
        }

        //3- check the event capacity
        $countReservations = $this->countEventReservations($eventId);
        if ($countReservations >= $event->capacity) {
            return throw new \Exception('Event is fully booked');
        }
        $newReservation = new Reservation();
        $newReservation->user_id = Auth::id();
        $newReservation->event_id = $eventId;
        $newReservation->save();

    }

    /**
     * @param $eventId
     * @return mixed
     */
    public function getConnectedUserReservationForAnEvent($eventId)
    {
        return Reservation::where('user_id', Auth::id())->where('event_id', $eventId)->first();
    }

    /**
     * @param $eventId
     * @return mixed
     */
    public function countEventReservations($eventId)
    {
        return Reservation::where('event_id', $eventId)->count();
    }

}
