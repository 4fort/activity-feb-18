<x-layouts.app>
    <h1>Register</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label for="name">Name</label>
            <x-input type="text" name="name" id="name" value="{{ old('name') }}" />
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <x-input type="email" name="email" id="email" value="{{ old('email') }}" />
            @error('email')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="password">Password</label>
            <x-input type="password" name="password" id="password" />
            @error('password')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="password_confirmation">Confirm Password</label>
            <x-input type="password" name="password_confirmation" id="password_confirmation" />
            @error('password_confirmation')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <x-button type="submit">Register</x-button>
    </form>
    <a href="/login">Already have an account?</a>
</x-layouts.app>
