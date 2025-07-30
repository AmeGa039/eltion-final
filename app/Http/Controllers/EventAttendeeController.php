<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventAttendeeController extends Controller
{
    public function join(Event $event)
    {
        // Don't join twice
        if (!$event->attendees->contains(Auth::id())) {
            $event->attendees()->attach(Auth::id());
        }

        return back()->with('success', 'You are attending this event.');
    }

    public function leave(Event $event)
    {
        $event->attendees()->detach(Auth::id());

        return back()->with('success', 'You left the event.');
    }
}

