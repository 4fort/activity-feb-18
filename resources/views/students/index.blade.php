@extends('layout')
@section('title', 'Students')
@section('main')
    <div>
        {{-- @if ('success')

        @endif --}}
        <h1>Students</h1>
        <h4>Add</h4>
        <form action="{{ route('student.add-student') }}" method="POST">
            @csrf
            <div class="">
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
                @error('name')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="">
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" id="dob">
                @error('dob')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <button type="submit">Submit</button>
        </form>

        <p>This is the list of students.</p>
        <table>
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Date of Birth</th>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->dob }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
