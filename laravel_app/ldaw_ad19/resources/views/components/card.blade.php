
<div class="col-md-4 mb-4">
    <a href="{!! route('evento', ['id' => $item->id]) !!}">
        <div class="card h-100 w-400">
            <img src="img/eventos.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title" style="color:black;"><strong>{{$item->titulo_evento}}</strong></h5>
                <p class="card-text" style="color:black;">{{$item->descripcion}}</p>
            </div>
        </div>
    </a>
</div>


