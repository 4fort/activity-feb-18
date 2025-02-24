<x-layouts.app>
    <div class="max-w-lg mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Edit Student</h2>

        <form action="{{ route('student.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $student->name) }}"
                    class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300">
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $student->email) }}"
                    class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300">
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="dob" class="block text-sm font-medium">Date of Birth</label>
                <input type="date" name="dob" id="dob" value="{{ old('dob', $student->dob) }}"
                    class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300">
                @error('dob')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
                    Update Student
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
