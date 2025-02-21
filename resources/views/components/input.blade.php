@props([
    'type' => 'text',
    'name' => '',
    'id' => '',
    'placeholder' => '',
    'value' => '',
])

@if ($type === 'search')
    <div class="relative flex items-center w-full">
        <svg class="absolute left-3 w-4 h-4 text-neutral-500" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-4.35-4.35m2.85-6.65a8 8 0 11-16 0 8 8 0 0116 0z" />
        </svg>
        <input type="search" name="{{ $name }}" id="{{ $id }}" placeholder="{{ $placeholder }}"
            value="{{ $value }}"
            {{ $attributes->merge([
                'class' => 'flex w-full h-10 pl-10 pr-3 py-2 text-sm bg-white border rounded-md border-neutral-300
                                        ring-offset-background placeholder:text-neutral-500 focus:border-neutral-300
                                        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400
                                        disabled:cursor-not-allowed disabled:opacity-50',
            ]) }} />
    </div>
@else
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}"
        placeholder="{{ $placeholder }}" value="{{ $value }}"
        {{ $attributes->merge([
            'class' => 'flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300
                                ring-offset-background placeholder:text-neutral-500 focus:border-neutral-300
                                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400
                                disabled:cursor-not-allowed disabled:opacity-50',
        ]) }} />
@endif
