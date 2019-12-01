@extends('layouts.app')
@include('includes.head')
@section('content')    
    
    <div class = "container">
        <div class="row justify-content-center">
            <!-- sidebar content -->
            <div id="sidebar" class="col-md-3 mb-4">   
                @include('includes.sidebar')       
            </div>
            <br>       
            <div class="col-md-9 mb-4">
                <div class="row row-cols-1 row-cols-md-2">                 
                    @foreach($evento as $item)
                        <div class="col">
                            <h2 class="mb-8 row"><b>{{$item->titulo_evento}}</b></h2> 
                            @if (Auth::user()->hasRole('Administrador'))
                            <div class=" float-right">
                                <a class="btn btn-success" href="{!! route('modificarEvento', ['id' => $item->id]) !!}" role="button"><i class="fas fa-pencil-alt"></i>&nbspModificar evento</a> 
                                <br>  
                            </div>
                        @endif
                        </div>
                        <div class="row mx-md-n5">
                            <div class="col px-md-5">
                                <div class="p-3  mb-3">
                                    <div class="row mb-2">
                                        <div class="col-md-2">
                                           <i class="fas fa-calendar-day "></i>
                                        </div>
                                        <div class="col-md-8">
                                            <h6>Fecha: {{$item->fecha}}</h6>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-md-2">
                                        <i class="fas fa-clock"></i>
                                        </div>
                                        <div class="col-md-8">
                                            <h6>Hora: {{$item->hora}}</h6>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-md-2">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="col-md-8">
                                            <h6>Sitio: {{$item->sitio}}, {{$item->ciudad}}</h6>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-md-2">
                                            <i class="fas fa-user-check"></i>
                                        </div>
                                        <div class="col-md-8">
                                            <h6>Lugares Diponibles: {{$item->capacidad_maxima - $item->afluencia_actual}}</h6>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-md-2">
                                            <i class="fas fa-university"></i>
                                        </div>
                                        <div class="col-md-8">
                                            <h6>Institución: {{$item->nombre}}</h6>
                                        </div>
                                    </div>

                                    <h4 class="mb-5 justify-content-center">{{$item->descripcion}}</h4>
                                </div>
                            </div>
                            <div class="col px-md-">
                                <div class="p-3 ">
                                    <img src="img/eventos.jpg" class="rounded  img-fluid " alt="...">
                                </div>
                            </div>
                        </div>
                        @endforeach                          
                </div>
                <div>
                    <p>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Asistentes
                        </button>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellidos</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($asistentes as $asistente)
                            <tr>
                                <th scope="row">{{$asistente->name}}</th>
                                <th scope="row">{{$asistente->apellido_paterno." ".$asistente->apellido_materno}}</th>
                            </tr>
                            @endforeach 
                            </tbody>
                        </table>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>

<footer class="row">
    @include('includes.footer')
</footer>
@endsection