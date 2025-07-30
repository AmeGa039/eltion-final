@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/event-form.css') }}">

@section('content')
<h1>Create Event</h1>

<form method="POST" action="{{ route('events.store') }}">
    @csrf

    <label>Title:</label><br>
    <input type="text" name="title" required><br>

    <label>Description:</label><br>
    <textarea name="description"></textarea><br>

    <label>Location:</label><br>
    <input type="text" name="location" required><br>

    <label>Start Time:</label><br>
    <input type="datetime-local" name="start_time" required><br>

    <label>End Time:</label><br>
    <input type="datetime-local" name="end_time" required><br>

    <label>
        <input type="checkbox" name="is_public" checked> Public Event
    </label><br><br>

    <button type="submit">Create</button>
</form>
@endsection
