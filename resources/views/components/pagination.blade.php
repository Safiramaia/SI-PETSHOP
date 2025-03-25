@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="opacity-50 cursor-default">&lsaquo;</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="text-gray-600 hover:text-gray-900">&lsaquo;</a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="text-gray-600 hover:text-gray-900">&rsaquo;</a>
            @else
                <span class="opacity-50 cursor-default">&rsaquo;</span>
            @endif
        </div>

        <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between">

            <div class="mb-4 mr-4">
                <span class="relative z-0 inline-flex shadow-sm">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-hidden="true"
                            class="opacity-50 cursor-default px-4 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 rounded-l-md">&lsaquo;</span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-l-md hover:bg-gray-200 focus:outline-none focus:ring focus:ring-gray-300">
                            &lsaquo;
                        </a>
                    @endif

                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span
                                class="opacity-50 cursor-default px-4 py-2 text-sm font-medium text-gray-400">{{ $element }}</span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span
                                        class="z-10 inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-600 border border-gray-600">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}"
                                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 hover:bg-gray-200 focus:outline-none focus:ring focus:ring-gray-300">{{ $page }}</a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-r-md hover:bg-gray-200 focus:outline-none focus:ring focus:ring-gray-300">
                            &rsaquo;
                        </a>
                    @else
                        <span aria-hidden="true"
                            class="opacity-50 cursor-default px-4 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 rounded-r-md">&rsaquo;</span>
                    @endif
                </span>
            </div>

        </div>
    </nav>
@endif