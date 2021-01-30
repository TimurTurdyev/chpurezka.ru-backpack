@if ($paginator->hasPages())
    <div class="pagination-wrap">
        @if ($paginator->onFirstPage())
            <a class="pagination-link disabled"
               aria-disabled="true"
               aria-label="@lang('pagination.previous')">
                <i class="fa fa-arrow-left"></i>
            </a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
               class="pagination-link"
               rel="prev"
               aria-label="@lang('pagination.previous')">
                <i class="fa fa-arrow-left"></i>
            </a>
        @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a aria-current="page" class="pagination-link active">1</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a aria-current="page" class="pagination-link active">{{$page}}</a>
                    @else
                        <a href="{{$url}}" class="pagination-link">{{$page}}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                   rel="next"
                   aria-label="@lang('pagination.next')"
                   class="pagination-link">
                    <i class="fa fa-arrow-right"></i>
                </a>
            @else
                <a aria-label="@lang('pagination.next')"
                   class="pagination-link">
                    <i class="fa fa-arrow-right"></i>
                </a>
            @endif
    </div>
@endif
