<x-layouts.app>
    <h1>Login</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
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
        <x-button type="submit">Login</x-button>
    </form>
    <a href="/register">Register</a>
</x-layouts.app>
