@if ($paginator->hasPages())
    <ul class="pagination justify-content-center justify-content-md-start">

        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Prev</a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}">Prev</a>

            </li>
        @endif

        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item">
                    <span class="page-link"><em class="icon ni ni-more-h"></em></span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page"><a class="page-link"
                                href="#">{{ $page }} <span class="visually-hidden">(current)</span></a>
                        </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                    @endif
                @endforeach
            @endif
        @endforeach


        @if ($paginator->hasMorePages())
            <li class="page-item">
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a>
            </li>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Next</a>
            </li>
        @endif
    </ul>
@endif
