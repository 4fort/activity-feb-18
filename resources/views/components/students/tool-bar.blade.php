<header class="flex items-center justify-between gap-2 py-2">
    <form action="{{ route('student.search') }}" method="GET" class="flex items
-center gap-2">
        <x-input type="search" name="search" placeholder="Search students..." value="{{ request('search') }}"
            class="max-w-[300px]" />
        <x-button type="submit">Search</x-button>
        @if (request()->has('search'))
            <x-button type="button" variant="secondary" onclick="window.location.href='{{ route('student.index') }}'">
                Clear
            </x-button>
        @endif
    </form>
    <x-students.add-student-dialog />
</header>
