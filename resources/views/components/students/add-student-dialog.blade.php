<x-dialog>
    <x-slot:trigger>
        <x-button @click="modalOpen = true"> Add Student </x-button>
    </x-slot:trigger>
    <x-slot:header>
        Add New Student
    </x-slot:header>
    <x-slot:content>
        <form action="{{ route('student.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="flex flex-col gap-0.5">
                <label for="name">Name</label>
                <x-input type="text" name="name" id="name" placeholder="Enter the students name"
                    value="{{ session('success') ? '' : old('name') }}" />
                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col gap-2">
                <label for="email">Email</label>
                <x-input type="email" name="email" id="email" placeholder="Enter the students email"
                    value="{{ session('success') ? '' : old('email') }}" />
                @error('email')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col gap-2">
                <label for="dob">Date of Birth</label>
                <x-date-picker name="dob" id="dob" value="{{ session('success') ? '' : old('dob') }}" />
                @error('dob')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-end gap-2">
                <x-button type="button" variant="ghost" @click="modalOpen=false">Cancel</x-button>
                <x-button type="submit">Submit</x-button>
            </div>
        </form>
    </x-slot:content>
</x-dialog>
