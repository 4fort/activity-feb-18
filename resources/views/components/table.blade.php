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
                                <td class="px-5 py-4 text-sm font-medium text-right whitespace-nowrap">
                                    <a class="text-blue-600 hover:text-blue-700" href="#">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
