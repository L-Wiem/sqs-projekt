<?php

namespace App\Services;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpException;

class EventService
{
    public function fetchEvents()
    {
        // Fetch events from the database
        return Event::query()->orderBy('created_at', 'desc')->paginate(10);
    }

    /**
     * @param $id
     * @return Event
     */
    public function fetchEvent($id)
    {
        // Fetch one event from the database
        return Event::find($id);
    }

    /**
     * @param array $data
     * @return Event
     */
    public function createEvent(array $data)
    {
        $data = $this->sanitizeData($data);

        $event = new Event();
        // Update the event instance with new data
        $event->fill($data);
        // Save the updated event to the database
        $event->user_id = Auth::user()->id;
        $event->save();
        return $event;
    }

    public function persistEvent(array $data)
    {
        // Create a new event instance
        $event = new Event();

        // Fill the event instance with data
        $event->fill($data);

        // Save the event to the database
        $event->save();

        return $event;
    }

    /**
     * @param int $id
     * @param array $data
     * @return Event
     */
    public function updateEvent(int $id, array $data)
    {
        $event = $this->fetchEvent($id);
        // Update the event instance with new data
        $event->fill($data);
        // Save the updated event to the database
        $event->save();
        return $event;
    }

    /**
     * @param $id
     * @return void
     */
    public function deleteEvent($id)
    {
        $event = $this->fetchEvent($id);
        if (null != $event) {
            $event->delete();
        } else {
            return throw new \Exception('Event not found');
        }
    }

    /**
     * @return Event[]
     */
    public function getConnectedUserEvents()
    {
       return Event::where('user_id', Auth::id())->get();
    }
    /**
     * @return Event[]
     */
    public function getConnectedUserEvent($eventId)
    {
        $event =  Event::where('user_id', Auth::id())->where('id', $eventId)->first();
        if (null == $event) {
            return throw new HttpException(404, 'Event not found');
        }
        return $event;
    }

    public function sanitizeData(array $data)
    {
        array_walk_recursive($data, function (&$data) {
            $data = strip_tags($data); // Remove HTML tags
            $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        });
        return $data;
    }

}
