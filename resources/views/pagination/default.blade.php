@if ($paginator->lastPage() > 1)
<ul> 
    <li><a href="{{ $paginator->url(1) }}">&lt;</a></li> 
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
    <li><a href="{{ $paginator->url($paginator->lastPage()) }}"">&gt;</a></li>  
</ul>
@endif