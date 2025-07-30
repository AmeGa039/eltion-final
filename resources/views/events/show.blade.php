@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/event-details.css') }}">

@section('content')
<h1>{{ $event->title }}</h1>

<p><strong>Description:</strong> {{ $event->description }}</p>
<p><strong>Location:</strong> {{ $event->location }}</p>
<p><strong>Starts:</strong> {{ $event->start_time }}</p>
<p><strong>Ends:</strong> {{ $event->end_time }}</p>

<p>
    @if($event->attendees->contains(auth()->id()))
        <form action="{{ route('events.leave', $event) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Leave Event</button>
        </form>
    @else
        <form action="{{ route('events.join', $event) }}" method="POST">
            @csrf
            <button type="submit">Join Event</button>
        </form>
    @endif
</p>

@if(auth()->id() === $event->user_id)
    <a href="{{ route('events.edit', $event) }}">Edit</a>
    <form action="{{ route('events.destroy', $event) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endif

<h3>Attendees ({{ $event->attendees->count() }})</h3>
<ul>
@foreach($event->attendees as $user)
    <li>{{ $user->name }}</li>
@endforeach
</ul>
@endsection
