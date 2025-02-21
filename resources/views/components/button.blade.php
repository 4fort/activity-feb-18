@props([
    'type' => 'button',
    'variant' => 'primary',
    'color' => 'neutral',
])

@php
    $baseClasses =
        'inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 text-nowrap whitespace-nowrap';

    $colors = [
        'neutral' => [
            'primary' => 'bg-neutral-950 text-white hover:bg-neutral-900 focus:ring-neutral-900',
            'secondary' =>
                'text-neutral-500 bg-neutral-50 hover:text-neutral-600 hover:bg-neutral-100 focus:ring-neutral-100',
            'outline' => 'bg-white text-neutral-900 border-2 border-neutral-900 hover:bg-neutral-900 hover:text-white',
            'ghost' => 'border border-neutral-300 text-neutral-700 hover:bg-neutral-100 focus:ring-neutral-100',
        ],
        'blue' => [
            'primary' => 'bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-700',
            'secondary' => 'text-blue-500 bg-blue-50 hover:text-blue-600 hover:bg-blue-100 focus:ring-blue-100',
            'outline' => 'bg-white text-blue-600 border-2 border-blue-600 hover:bg-blue-600 hover:text-white',
            'ghost' => 'border border-blue-300 text-blue-700 hover:bg-blue-100 focus:ring-blue-100',
        ],
        'red' => [
            'primary' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-700',
            'secondary' => 'text-red-500 bg-red-50 hover:text-red-600 hover:bg-red-100 focus:ring-red-100',
            'outline' => 'bg-white text-red-600 border-2 border-red-600 hover:bg-red-600 hover:text-white',
            'ghost' => 'border border-red-300 text-red-700 hover:bg-red-100 focus:ring-red-100',
        ],
        'green' => [
            'primary' => 'bg-green-600 text-white hover:bg-green-700 focus:ring-green-700',
            'secondary' => 'text-green-500 bg-green-50 hover:text-green-600 hover:bg-green-100 focus:ring-green-100',
            'outline' => 'bg-white text-green-600 border-2 border-green-600 hover:bg-green-600 hover:text-white',
            'ghost' => 'border border-green-300 text-green-700 hover:bg-green-100 focus:ring-green-100',
        ],
        'yellow' => [
            'primary' => 'bg-yellow-500 text-white hover:bg-yellow-600 focus:ring-yellow-600',
            'secondary' =>
                'text-yellow-600 bg-yellow-50 hover:text-yellow-700 hover:bg-yellow-100 focus:ring-yellow-100',
            'outline' => 'bg-white text-yellow-600 border-2 border-yellow-500 hover:bg-yellow-500 hover:text-white',
            'ghost' => 'border border-yellow-300 text-yellow-700 hover:bg-yellow-100 focus:ring-yellow-100',
        ],
    ];

    $variantClass = $colors[$color][$variant] ?? $colors['neutral']['primary'];
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => "$baseClasses $variantClass"]) }}>
    {{ $slot }}
</button>
