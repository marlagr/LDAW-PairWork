 <!-- sidebar nav -->
<div class="row">
    <div class="col">
        <div class="list-group" id="list-tab" role="tablist">
        @if (Route::has('login'))
            @foreach($permisos as $item)
                @if (Route::has('register'))
                <a class="list-group-item list-group-item-action" id="list-home-list" href="{{ route($item->ruta) }}"><i class="fas fa-chevron-right"></i>&nbsp{{ $item->nombre }}</a>
                @endif
            @endforeach
        @endif
        </div>
    </div>
</div>
       