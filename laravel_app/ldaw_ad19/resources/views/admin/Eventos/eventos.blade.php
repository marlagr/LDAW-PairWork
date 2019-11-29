@extends('layouts.app')
@include('includes.head')

@section('content')
<div class = "container">
<div class="container">
    <h1 >&nbsp;&nbsp;<i class="fas fa-calendar-check fa-2x"></i>
    <div class="float-right">
    <a class="list-group-item list-group-item-action" id="list-home-list" href="{{ route('nuevoEvento') }}"><button type="button" class="btn btn-info" >Agregar Eventos</button></a>
        
    </div><br>
    <h2><b>Eventos</b></h2>
    <h4>Asiste a los mejores eventos</h4>
    <h6 font-weight="lighter">Recibe notificaciones y explora eventos en tu área. Asiste a los mejores eventos. Paga rápido con tu tarjeta y confirma tu asistencia. </h6>
    <br>
</div>

    <div class="row row-cols-1 row-cols-md-2">
        @foreach($eventos as $item)
            @if (Route::has('register'))
                    @include('components.card')
            @endif
        @endforeach
    </div>
</div>

<footer class="row">
    @include('includes.footer')
</footer>


@endsection