{{-- <nav>
    <ul class="breadcrumbs">
        <li class="breadcrumb-item pl-0">
            <a href="{{ route('dashboard') }}">dashboard</a>
        </li>
        
        @foreach ($paths as $path)
            <li class="breadcrumb-item pl-0 text-capitalize 
                    {{ $loop->last ? 'active' : '' }}">
                <a href="{{ url($path) }}">
                    {{ str_replace('-', ' ', $path) }}
                </a>
            </li>
        @endforeach
    </ul>
</nav> --}}

<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/">Home</a>  </li>              
{{ $link = ""; }}
@for($i = 1; $i <= count(Request::segments()); $i++)
    @if($i < count(Request::segments()) & $i > 0)
    <?php $link .= "/" . Request::segment($i); ?>
        <li class="breadcrumb-item">
            <a href="<?= $link ?>">{{ ucwords(str_replace('-',' ',Request::segment($i)))}}</a> 
        </li>
    @else 
        <li class="breadcrumb-item active">
            {{ucwords(str_replace('-',' ',Request::segment($i)))}} </li>
    @endif
@endfor
</ol>

                              
                           