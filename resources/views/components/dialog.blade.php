<div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false" :class="{ 'z-40': modalOpen }"
    x-init="modalOpen = {{ $errors->any() ? 'true' : 'false' }}" class="relative w-auto h-auto">
    {{ $trigger ?? '' }}

    <template x-teleport="body">
        <template x-if="modalOpen">
            <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 10)" x-effect="if (!modalOpen) show = false"
                @transitionend="if (!show) modalOpen = false"
                class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen">

                <!-- Overlay -->
                <div @click="show = false" x-show="show" x-transition.opacity.duration.200ms
                    class="absolute inset-0 w-full h-full bg-gray-900 bg-opacity-50 backdrop-blur-sm">
                </div>

                <!-- Modal Content -->
                <div x-show="show" x-trap.inert.noscroll="show" x-transition:enter="ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-90"
                    class="relative w-full py-6 bg-white shadow-md px-7 bg-opacity-90 drop-shadow-md backdrop-blur-sm sm:max-w-lg sm:rounded-lg">

                    @if (!empty($header))
                        <div class="flex items-center justify-between pb-3">
                            <h3 class="text-lg font-semibold">{{ $header ?? '' }}</h3>
                            <button type="button" @click="modalOpen=false"
                                class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    @endif


                    @if (!empty($description))
                        <div class="relative w-auto pb-8 text-neutral-500">
                            <p>{{ $description }}</p>
                        </div>
                    @endif

                    {{ $content ?? '' }}

                    @if (!empty($footer))
                        <div {{ $attributes->merge(['class' => 'flex flex-row sm:justify-end sm:space-x-2 mt-auto']) }}>
                            {{ $footer }}
                        </div>
                    @endif

                </div>
            </div>
        </template>
    </template>
</div>
