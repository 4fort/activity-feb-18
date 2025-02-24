<div class="flex flex-col rounded-md overflow-clip border border-neutral-200">
    <div class="overflow-x-auto">
        <div class="inline-block min-w-full">
            <div class="overflow-hidden">
                <table class="min-w-full divide-y divide-neutral-200">
                    <thead>
                        <tr class="text-neutral-500 bg-neutral-100">
                            @foreach ($columns as $column)
                                <th class="px-5 py-3 text-xs font-medium text-left ">
                                    {{ $column['label'] }}
                                </th>
                            @endforeach
                            <th class="px-5 py-3 text-xs font-medium text-right uppercase" />
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-200">
                        @foreach ($rows as $row)
                            <tr class="text-neutral-800">
                                @foreach ($columns as $column)
                                    <td class="px-5 py-4 text-sm whitespace-nowrap">
                                        {{ $row[$column['key']] ?? '-' }}
                                    </td>
                                @endforeach
                                <td class="px-5 py-4 whitespace-nowrap flex justify-end gap-4">
                                    {{-- <x-icons.ellipsis class="size-5 ml-auto" /> --}}
                                    {{-- <x-popover /> --}}
                                    <x-button color="blue"
                                        onclick="window.location.href='{{ route('student.edit', $row['id']) }}'">
                                        Edit
                                    </x-button>

                                    <form action="{{ route('student.destroy', $row['id']) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this student?');">
                                        @csrf
                                        @method('DELETE')
                                        <x-button color="red" type="submit">
                                            Delete
                                        </x-button>
                                    </form>


                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
