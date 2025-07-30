<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        // Show all public events + user’s own private events
        $events = Event::where('is_public', true)
            ->orWhere('user_id', Auth::id())
            ->latest()
            ->get();

        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'location'    => 'required|string|max:255',
            'start_time'  => 'required|date',
            'end_time'    => 'required|date|after:start_time',
            'is_public'   => 'boolean'
        ]);

        Event::create([
            'user_id'     => Auth::id(),
            'title'       => $request->title,
            'description' => $request->description,
            'location'    => $request->location,
            'start_time'  => $request->start_time,
            'end_time'    => $request->end_time,
            'is_public'   => $request->boolean('is_public')
        ]);

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function show(Event $event)
    {
        $this->authorize('view', $event); // Optional policy for privacy

        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        $this->authorize('update', $event);

        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $this->authorize('update', $event);

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'location'    => 'required|string|max:255',
            'start_time'  => 'required|date',
            'end_time'    => 'required|date|after:start_time',
            'is_public'   => 'boolean'
        ]);

        $event->update($request->only('title', 'description', 'location', 'start_time', 'end_time', 'is_public'));

        return redirect()->route('events.show', $event)->with('success', 'Event updated.');
    }

    public function destroy(Event $event)
    {
        $this->authorize('delete', $event);

        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted.');
    }
}
