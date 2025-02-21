<x-layouts.app title="Students">
    <div class="container mx-auto">
        @if (session()->has('success'))
            <x-alert status="success">
                <x-slot:title>Success</x-slot:title>
                <x-slot:description>
                    {{ session('success') }}
                </x-slot:description>
            </x-alert>
        @endif
        @if ($errors->any())
            <x-alert status="error">
                <x-slot:title>Validation Error</x-slot:title>
                <x-slot:description>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </x-slot:description>
            </x-alert>
        @endif


        <x-students.tool-bar />

        <div>
            <x-table :columns="$table->columns" :rows="$table->rows" />
            {!! $students->links('components.pagination') !!}
        </div>

    </div>
</x-layouts.app>
