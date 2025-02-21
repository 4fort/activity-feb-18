@props([
    'status' => 'neutral',
    'variant' => 'default',
])

@php
    $baseClasses =
        'relative w-full rounded-lg p-4 [&>svg]:absolute [&>svg]:left-4 [&>svg]:top-4 [&>svg+div]:translate-y-[-3px] [&:has(svg)]:pl-11';

    $defaultStatuses = [
        'neutral' => 'border border-neutral-300 bg-white text-neutral-900 [&>svg]:text-neutral-600',
        'info' => 'border border-blue-300 bg-blue-50 text-blue-700 [&>svg]:text-blue-700',
        'success' => 'border border-green-300 bg-green-50 text-green-700 [&>svg]:text-green-700',
        'warning' => 'border border-yellow-300 bg-yellow-50 text-yellow-700 [&>svg]:text-yellow-700',
        'error' => 'border border-red-300 bg-red-50 text-red-700 [&>svg]:text-red-700',
    ];

    $solidStatuses = [
        'neutral' => 'border border-transparent bg-neutral-700 text-white [&>svg]:text-white',
        'info' => 'border border-transparent bg-blue-600 text-white [&>svg]:text-white',
        'success' => 'border border-transparent bg-green-500 text-white [&>svg]:text-white',
        'warning' => 'border border-transparent bg-yellow-500 text-white [&>svg]:text-white',
        'error' => 'border border-transparent bg-red-600 text-white [&>svg]:text-white',
    ];

    $ghostStatuses = [
        'neutral' => 'border border-transparent bg-neutral-50 text-neutral-700 [&>svg]:text-neutral-700',
        'info' => 'border border-transparent bg-blue-50 text-blue-700 [&>svg]:text-blue-700',
        'success' => 'border border-transparent bg-green-50 text-green-700 [&>svg]:text-green-700',
        'warning' => 'border border-transparent bg-yellow-50 text-yellow-700 [&>svg]:text-yellow-700',
        'error' => 'border border-transparent bg-red-50 text-red-700 [&>svg]:text-red-700',
    ];

    $statusClass = match ($variant) {
        'solid' => $solidStatuses[$status] ?? $solidStatuses['neutral'],
        'ghost' => $ghostStatuses[$status] ?? $ghostStatuses['neutral'],
        default => $defaultStatuses[$status] ?? $defaultStatuses['neutral'],
    };
@endphp

<div {{ $attributes->merge(['class' => "$baseClasses $statusClass"]) }}>
    <svg class="w-5 h-5 -translate-y-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
        stroke-width="1.5" stroke="currentColor">
        @if ($status === 'info')
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
        @elseif($status === 'success')
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        @elseif($status === 'warning')
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
        @elseif($status === 'error')
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
        @else
            <polyline points="4 17 10 11 4 5"></polyline>
            <line x1="12" x2="20" y1="19" y2="19"></line>
        @endif
    </svg>

    <div>
        <h5 class="mb-1 font-medium leading-none tracking-tight">
            {{ $title ?? $slot }}
        </h5>
        @isset($description)
            <div class="text-sm opacity-80">
                {{ $description }}
            </div>
        @endisset
    </div>
</div>
