@if ($paginator->hasPages())
    <div class="flex items-center justify-between w-full h-16 px-3 border-t border-neutral-200">
        <!-- Showing X to Y of Z results -->
        <p class="pl-2 text-sm text-gray-700">
            Showing
            <span class="font-medium">{{ $paginator->firstItem() }}</span>
            to
            <span class="font-medium">{{ $paginator->lastItem() }}</span>
            of
            <span class="font-medium">{{ $paginator->total() }}</span> results
        </p>

        <!-- Pagination Links -->
        <nav>
            <ul
                class="flex items-center text-sm leading-tight bg-white border divide-x rounded h-9 text-neutral-500 divide-neutral-200 border-neutral-200">
                <!-- Previous Page Link -->
                @if ($paginator->onFirstPage())
                    <li class="h-full">
                        <span
                            class="relative inline-flex items-center h-full px-3 ml-0 rounded-l text-gray-400 cursor-not-allowed">
                            Previous
                        </span>
                    </li>
                @else
                    <li class="h-full">
                        <a href="{{ $paginator->previousPageUrl() }}"
                            class="relative inline-flex items-center h-full px-3 ml-0 rounded-l group hover:text-neutral-900">
                            Previous
                        </a>
                    </li>
                @endif

                <!-- Pagination Elements -->
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="hidden h-full md:block">
                            <span
                                class="relative inline-flex items-center h-full px-2.5 group">{{ $element }}</span>
                        </li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="hidden h-full md:block">
                                    <span
                                        class="relative inline-flex items-center h-full px-3 text-neutral-900 bg-gray-50">
                                        {{ $page }}
                                    </span>
                                </li>
                            @else
                                <li class="hidden h-full md:block">
                                    <a href="{{ $url }}"
                                        class="relative inline-flex items-center h-full px-3 group hover:text-neutral-900">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                <!-- Next Page Link -->
                @if ($paginator->hasMorePages())
                    <li class="h-full">
                        <a href="{{ $paginator->nextPageUrl() }}"
                            class="relative inline-flex items-center h-full px-3 rounded-r group hover:text-neutral-900">
                            Next
                        </a>
                    </li>
                @else
                    <li class="h-full">
                        <span
                            class="relative inline-flex items-center h-full px-3 rounded-r text-gray-400 cursor-not-allowed">
                            Next
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif
