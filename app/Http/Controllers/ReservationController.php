<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Services\ReservationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    //Make a reservation for an event
    public function reserveEvent($id)
    {
        $reservationService = new ReservationService();
        try {
            $reservationService->reserveEventForConnectedUser($id);
        } catch (\Exception $e) {
            return redirect()->route('show_event', ['id' => $id])->with('error', $e->getMessage());
        }
        return redirect()->route('myReservations')->with('success', 'Reservation successful');
    }

    public function myReservations()
    {
        $reservationService = new ReservationService();
        $reservations = $reservationService->getConnectedUserReservations();
        return view('myReservations', compact('reservations'));
    }
}
