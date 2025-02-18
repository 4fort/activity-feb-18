@extends('layout')
@section('title', 'Students')
@section('main')
    <h1>Students</h1>
    <p>This is the list of students.</p>
    <ul>
        @foreach ($students as $student)
            <li>{{ $student->name }}</li>
        @endforeach
    </ul>

@endsection
