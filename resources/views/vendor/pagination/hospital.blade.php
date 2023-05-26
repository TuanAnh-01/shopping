
@if ($paginator->hasPages())
<nav class="blog-pagination justify-content-center d-flex">
    <ul class="pagination">
        @if ($paginator->onFirstPage())
        <li class="page-item">
            <a href="#" class="page-link" aria-label="Previous">
                <i class="ti-angle-left"></i>
            </a>
        </li>
        @else
        <a href="{{ $paginator->previousPageUrl() }}" class="page-link" aria-label="Previous">
            <i class="ti-angle-left"></i>
        </a>
        @endif

        @foreach ($elements as $element)
        @if (is_string($element))
        <li class="page-item">
            <a href="#" class="page-link">{{ $element }}</a>
        </li>
        @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <li class="page-item">
                        <a href="#" class="page-link">{{ $element }}</a>
                    </li>
                    @else
                    <li class="page-item">
                        <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                    </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        <li class="page-item">
            <a href="#" class="page-link" aria-label="Next">
                <i class="ti-angle-right"></i>
            </a>
        </li>
    </ul>
</nav>
@endif