@extends('layouts.app')
@include('includes.head')

@section('content')

    <div class="container">
        <div class="row justify-content-center">            
            <div class="col-md-10 mb-4">
                <h1 >&nbsp;&nbsp;<i class="fas fa-calendar-check fa-2x"></i>
                <h2><b>Eventos</b></h2>
                <h4>Asiste a los mejores eventos</h4>
                <h6 font-weight="lighter">Recibe notificaciones y explora eventos en tu área. Asiste a los mejores eventos. Paga rápido con tu tarjeta y confirma tu asistencia. </h6>
                <br>
            </div>
            <div class="col-md-2 mb-4">
                <a class="btn btn-success" href="{{ route('nuevoEvento') }}" role="button"><i class="fas fa-pencil-alt"></i>&nbspCrear nuevo evento</a> 
                <br>  
            </div>
        </div>
    </div>

    
    <div class = "container">
        <div class="row justify-content-center">

            <!-- sidebar content -->
            <div id="sidebar" class="col-md-3 mb-4">
                @include('includes.sidebar')
            </div>
            <br>

            <div class="col-md-9 mb-4">
                <div class="row row-cols-1 row-cols-md-2">
                    @foreach($eventos as $item)
                        @if (Route::has('register'))
                            @include('components.card')
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>


<footer class="row">
    @include('includes.footer')
</footer>


@endsection