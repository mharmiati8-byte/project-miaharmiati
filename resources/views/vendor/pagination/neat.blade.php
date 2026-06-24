@if ($paginator->hasPages())
<nav class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3" aria-label="Pagination">
    <div class="px-3 py-2 rounded-pill border bg-white shadow-sm text-muted small">
        Menampilkan <span class="fw-semibold text-dark">{{ $paginator->firstItem() }}</span>
        sampai <span class="fw-semibold text-dark">{{ $paginator->lastItem() }}</span>
        dari <span class="fw-semibold text-dark">{{ $paginator->total() }}</span> data
    </div>

    <ul class="pagination pagination-sm mb-0 flex-wrap gap-1">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                <span class="page-link rounded-pill px-3">&lsaquo;</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link rounded-pill px-3" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="{{ __('pagination.previous') }}">&lsaquo;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><span class="page-link rounded-pill">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page"><span class="page-link rounded-pill">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link rounded-pill" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link rounded-pill px-3" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="{{ __('pagination.next') }}">&rsaquo;</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                <span class="page-link rounded-pill px-3">&rsaquo;</span>
            </li>
        @endif
    </ul>
</nav>
@endif
