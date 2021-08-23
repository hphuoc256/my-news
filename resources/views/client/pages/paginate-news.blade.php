@if ($paginator->hasPages())
    <div class="container">                
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="disabled page-item">
                    <a class="page-link" ><span>Trước</span></a>
                </li>
            @else
                <li class="page-item">
                    <a  class="page-link" href="{{ $paginator->previousPageUrl() }}"><span>Trước</span></a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a class="page-link" href="javascript:;">{{ $page }}</a></li>
                        @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                            <li><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @elseif ($page == $paginator->lastPage() - 1)
                            <li class="page-item disabled"><span><a class="page-link" href="javascript:;">...</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}"><span>Sau</span></a>
                </li>
            @else
                <li class="disabled page-item">
                    <a class="page-link" ><span>Sau</span></a>
                </li>
            @endif
        </ul>
    </div>
@endif