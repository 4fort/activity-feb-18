@props([
    'name' => '',
    'id' => '',
    'placeholder' => 'Select date',
    'format' => 'M d, Y',
    'value' => '',
])

<div x-data="datePicker" x-init="init('{{ $value }}', '{{ $format }}')" x-cloak>

    <div class="w-full select-none">
        <div class="relative w-[17rem]">
            <input type="text" id="{{ $id }}" name="{{ $name }}" x-model="datePickerValue"
                @click="toggle" @keydown.escape="close"
                class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md text-neutral-600 border-neutral-300 ring-offset-background placeholder:text-neutral-400 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50"
                placeholder="{{ $placeholder }}" readonly />

            <div @click="toggle"
                class="absolute top-0 right-0 px-3 py-2 cursor-pointer text-neutral-400 hover:text-neutral-500">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0z" />
                </svg>
            </div>

            <div x-show="datePickerOpen" x-transition @click.away="close"
                class="absolute top-0 left-0 max-w-lg p-4 mt-12 antialiased bg-white border rounded-lg shadow w-[17rem] border-neutral-200/70">

                <div class="flex items-center justify-between mb-2">
                    <div>
                        <span x-text="datePickerMonthNames[datePickerMonth]"
                            class="text-lg font-bold text-gray-800"></span>
                        <span @click="datePickerToggleYearSelection"
                            class="ml-1 text-lg font-normal text-gray-600 cursor-pointer hover:underline"
                            x-text="datePickerYear"></span>
                    </div>

                    <div>
                        <button @click="datePickerPreviousMonth" type="button"
                            class="p-1 rounded-full hover:bg-gray-100">
                            <svg class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button @click="datePickerNextMonth" type="button" class="p-1 rounded-full hover:bg-gray-100">
                            <svg class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>

                <x-scroll-area x-show="datePickerSelectingYear"
                    class="grid grid-cols-4 gap-2 max-h-[200px] p-2 border rounded-md bg-neutral-50">
                    <template x-for="year in datePickerYearRange" :key="year">
                        <div @click="datePickerSetYear(year)"
                            class="text-center p-1 cursor-pointer rounded-md hover:bg-neutral-300"
                            :class="datePickerYear === year ? 'bg-neutral-800 text-white' : 'text-gray-600'">
                            <span x-text="year"></span>
                        </div>
                    </template>
                </x-scroll-area>

                <div class="grid grid-cols-7 mt-2">
                    <template x-for="day in datePickerDays">
                        <div class="text-xs font-medium text-center text-gray-800" x-text="day"></div>
                    </template>
                </div>

                <div class="grid grid-cols-7">
                    <template x-for="blankDay in datePickerBlankDaysInMonth">
                        <div class="p-1 text-sm text-center border border-transparent"></div>
                    </template>
                    <template x-for="(day, dayIndex) in datePickerDaysInMonth" :key="dayIndex">
                        <div class="text-sm text-center cursor-pointer h-7 w-7 rounded-full flex items-center justify-center"
                            :class="datePickerIsSelectedDate(day) ? 'bg-neutral-800 text-white' :
                                'text-gray-600 hover:bg-neutral-200'"
                            @click="datePickerDayClicked(day)">
                            <span x-text="day"></span>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</div>
