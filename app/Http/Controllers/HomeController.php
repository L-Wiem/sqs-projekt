<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Services\CategoryService;
use App\Services\EventService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // fetch last events
        $eventService = new EventService();
        $events =  $eventService->fetchEvents();

        // fetch all categories
        $categoryService = new CategoryService();
        $categories =  $categoryService->fetchAll();

        return view('homepage', compact('events', 'categories'));
    }
    public function showEvent($id)
    {
        $eventService = new EventService();
        $event =  $eventService->fetchEvent($id);
        return view('events/showEvent', compact('event'));
    }
    public function searchEventWithKeyword(Request $resquest){
        $events = Event::where('title', 'like', '%' . $resquest->keyword. '%')
            ->orWhere('description', 'like', '%' . $resquest->keyword . '%')
            ->get();
        return view('search', compact('events'));
    }
}

