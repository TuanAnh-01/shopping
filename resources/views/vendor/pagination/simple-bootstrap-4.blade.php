@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                
            @else
                <li class="page-item">
                    <a class="page-link" style="margin-right: 30px" href="{{ $paginator->previousPageUrl() }}" rel="prev"> << Bình luận mới hơn</a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Bình luận cũ hơn >></a>
                </li>
            @else
                {{-- <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">Bình luận </span>
                </li> --}}
            @endif
        </ul>
    </nav>
@endif
