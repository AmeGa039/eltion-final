@extends('layouts.app')


<link rel="stylesheet" href="{{ asset('css/event-edit.css') }}">

@section('content')
<h1>Edit Event</h1>

<form method="POST" action="{{ route('events.update', $event) }}">
    @csrf
    @method('PUT')

    <label>Title:</label><br>
    <input type="text" name="title" value="{{ $event->title }}" required><br>

    <label>Description:</label><br>
    <textarea name="description">{{ $event->description }}</textarea><br>

    <label>Location:</label><br>
    <input type="text" name="location" value="{{ $event->location }}" required><br>

    <label>Start Time:</label><br>
    <input type="datetime-local" name="start_time" value="{{ $event->start_time->format('Y-m-d\TH:i') }}" required><br>

    <label>End Time:</label><br>
    <input type="datetime-local" name="end_time" value="{{ $event->end_time->format('Y-m-d\TH:i') }}" required><br>

    <label>
        <input type="checkbox" name="is_public" {{ $event->is_public ? 'checked' : '' }}> Public Event
    </label><br><br>

    <button type="submit">Update</button>
</form>
@endsection
