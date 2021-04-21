@if ($paginator->hasPages())
<ul class="pagination">

    @if ($paginator->onFirstPage())
    <li class="changePageButton disabled"><span><i class="fas fa-chevron-left"></i></span></li>
    @else
    <li><a class='changePageButton' href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fas fa-chevron-left"></i></a></li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}


    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <li class="productPageNo activeProductLink"><span>{{ $page }}</span></li>
    @else
    <li><a class="productPageNo" href="{{ $url }}">{{ $page }}</a></li>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <li><a class="changePageButton" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fas fa-chevron-right"></i></a></li>
    @else
    <li class='changePageButton' class="disabled"><span><i class="fas fa-chevron-right"></i></span></li>
    @endif
</ul>
@endif