<x-layouts.app title="Students">
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

        <div class="container mx-auto">
            <x-table :columns="$columns" :rows="$rows" />
        </div>

    </div>
</x-layouts.app>
