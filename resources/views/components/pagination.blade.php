{{-- 
<nav aria-label="Pagination" class="my-5">
    <ul class="_pagination">
        <li class="page-item">
            <a href="#" class="_previous page-link page-link font-2 display-20 color-black" rel="prev">
                <
            </a>
        </li>
        <li class="page-item active" aria-current="page">
            <span class="page-link font-3 display-14 color-white">1 </span>
        </li>
        <li class="page-item">
            <a href="#" class="page-link font-2 display-16 color-black"> 2 </a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link font-2 display-16 color-black"> 3 </a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link font-2 display-16 color-black"> 4 </a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link font-2 display-16 color-black"> 5 </a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link font-2 display-20 color-black" rel="next">
              >
            </a>
        </li>
   
    </ul>
</nav> --}}



<nav aria-label="Pagination" class="my-5">
    @if ($paginator->hasPages())
        <ul class="_pagination">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link font-2 display-20 color-black">
                        <
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $paginator->previousPageUrl() }}" class="page-link font-2 display-20 color-black" rel="prev">
                        <
                    </a>
                </li>
            @endif
           @foreach ($paginator->links() as $link)
                @if ($link['url'] === null)
                    <li class="page-item disabled">
                        <span class="page-link font-3 display-14 color-white">{{ $link['label'] }}</span>
                    </li>
                @else
                    <li class="page-item{{ $link['active'] ? ' active' : '' }}">
                        <a href="{{ $link['url'] }}" class="page-link font-2 display-16 color-black">{{ $link['label'] }}</a>
                    </li>
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a href="{{ $paginator->nextPageUrl() }}" class="page-link font-2 display-20 color-black" rel="next">
                        >
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link font-2 display-20 color-black">
                        >
                    </span>
                </li>
            @endif
        </ul>
    @endif
</nav>