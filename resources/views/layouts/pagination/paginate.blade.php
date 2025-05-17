<nav class="product-pagination">
    <ul class="pagination-list">
        @if ($paginator->hasPages())
            @if (!$paginator->onFirstPage())
                <li class="page-item disabled">
                    <a href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">&laquo;</a>
                </li>
            @else
                <li class="page-item disabled">
                    <a href="#" aria-label="Previous">&laquo;</a>
                </li>
            @endif

            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a href="#">{{ $page }} </a></li>
                            @else
                                <li class="page-item"><a href="{{ $url }} ">{{ $page }} </a></li>
                            @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a href="{{ $paginator->nextPageUrl() }}" aria-label="Next">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled">
                    <a href="#" aria-label="Next">&raquo;</a>
                </li>
            @endif

        @endif

    </ul>
</nav>



