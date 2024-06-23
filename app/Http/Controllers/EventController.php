<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use App\Services\CategoryService;
use App\Services\EventService;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function addEvent()
    {
        // fetch all categories
        $categoryService = new CategoryService();
        $categories = $categoryService->fetchAll();
        return view('events.addEvent', compact('categories'));
    }

    public function storeEvent(Request $request)
    {
        $eventService = new EventService();
        $data = $request->request->all();
        $eventService->createEvent($data);
        return redirect()->route('myEvents')->with('success', 'Event created successfully.');
    }


    public function editEvent($id)
    {
        $eventService = new EventService();
        $event = $eventService->getConnectedUserEvent($id);
        $categoryService = new CategoryService();
        $categories = $categoryService->fetchAll();

        return view('events/editEvent', compact('event','categories'));
    }

    public function updateEvent(Request $request, $id)
    {
        $eventService = new EventService();
        $data = $request->request->all();
        $eventService->updateEvent($id, $data);

        return redirect()->route('show_event', ['id' => $id])->with('success', 'Event updated successfully.');
    }

    public function deleteEvent($id)
    {
        $eventService = new EventService();
        $eventService->deleteEvent($id);
        return redirect()->route('myEvents')->with('success', 'Event deleted successfully.');
    }

    public function myEvents()
    {
        // Retrieve events for the authenticated user with user_id equal to $id
        $eventService = new EventService();
        $events = $eventService->getConnectedUserEvents();
        return view('myEvents', compact('events'));
    }
}
