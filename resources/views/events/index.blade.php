@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/event-list.css') }}">

@section('content')
<h1>All Events</h1>

<a href="{{ route('events.create') }}">Create New Event</a>

@foreach($events as $event)
    <div style="margin-bottom: 1.5rem;">
        <h2><a href="{{ route('events.show', $event) }}">{{ $event->title }}</a></h2>
        <p><strong>Location:</strong> {{ $event->location }}</p>
        <p><strong>Time:</strong> {{ $event->start_time }} to {{ $event->end_time }}</p>
        <p>{{ Str::limit($event->description, 100) }}</p>
    </div>
@endforeach
@endsection
