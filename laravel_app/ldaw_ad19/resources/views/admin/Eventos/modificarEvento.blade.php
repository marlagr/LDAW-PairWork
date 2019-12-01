@extends('layouts.app')
@include('includes.head')

@section('content')
<div class="container">
    <h1 >&nbsp;&nbsp;&nbsp;<i class="fas fa-user-friends  fa-2x"></i></h1>
    <h2><b>Modificar Evento</b></h2>
    <br>
</div>
<div class="container">
        <div class="row justify-content-center">
        <!-- sidebar content -->
        <div id="sidebar" class="col-md-3">
            @include('includes.sidebar')
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Cambia la información que desees') }}</div>
                <div class="card-body">
                @foreach($evento as $item)
                    <form method="POST" action="{!! route('eventoAModificar', ['id' => $item->id]) !!}">
                        @csrf
                       
                        <div class="form-group row">
                            <label for="titulo_evento" class="col-md-4 col-form-label text-md-right">{{ __('Título del evento') }}</label>

                            <div class="col-md-6">
                                <input id="titulo_evento" type="text" class="form-control @error('titulo_evento') is-invalid @enderror" name="titulo_evento" value="{{ $item->titulo_evento }}" required autocomplete="titulo_evento" autofocus>

                                @error('titulo_evento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>

                            <div class="col-md-6">
                                <input id="descripcion" type="text" class="form-control @error('name') is-invalid @enderror" name="descripcion" value="{{ $item->descripcion }}" required autocomplete="descripcion" autofocus>

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>

                            <div class="col-md-6">                              
                                <input id="fecha" type="text" class="form-control datepicker" name="fecha" value="{{ $item->fecha }}" required autocomplete="fecha" placeholder="AAAA-MM-DD" autofocus>

                                @error('fecha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hora" class="col-md-4 col-form-label text-md-right">{{ __('Hora') }}</label>

                            <div class="col-md-6">
                                <input id="hora" type="text" class="form-control @error('name') is-invalid @enderror" name="hora" value="{{ $item->hora }}" placeholder="HH:MM:SS" required autocomplete="hora" autofocus>

                                @error('hora')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sitio" class="col-md-4 col-form-label text-md-right">{{ __('Sitio') }}</label>

                            <div class="col-md-6">
                                <input id="sitio" type="text" class="form-control @error('sitio') is-invalid @enderror" name="sitio" value="{{ $item->sitio }}" required autocomplete="sitio" autofocus>

                                @error('sitio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>
                            <div class="col-md-6">
                                <select name="id_estado" id="id_estado" class="form-control" required>                                   
                                    @foreach($estados as $estado)
                                        @if( $estado->id_estado == $item->id_estado)
                                            <option value="{{ $estado->id_estado }}" selected="selected">{{ $estado->Nombre }}</option>
                                        @else
                                            <option value="{{ $estado->id_estado }}">{{ $estado->Nombre }}</option>
                                        @endif
                                    @endforeach
                                </select>                          
                                @error('id_estado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="ciudad" class="col-md-4 col-form-label text-md-right">{{ __('Ciudad') }}</label>

                            <div class="col-md-6">
                                <input id="ciudad" type="ciudad" class="form-control @error('ciudad') is-invalid @enderror" name="ciudad" value="{{ $item->ciudad }}" required autocomplete="ciudad">

                                @error('ciudad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ $item->telefono }}" required autocomplete="telefono">

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="capacidad_maxima" class="col-md-4 col-form-label text-md-right">{{ __('Capacidad Máxima') }}</label>

                            <div class="col-md-6">
                                <input id="capacidad_maxima" type="number" class="form-control" name="capacidad_maxima" value="{{ $item->capacidad_maxima }}" required autocomplete="capacidad_maxima">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="costo" class="col-md-4 col-form-label text-md-right">{{ __('Costo') }}</label>

                            <div class="col-md-6">
                                <input id="costo" type="number" class="form-control" name="costo" value="{{ $item->costo }}" required autocomplete="costo">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="instituciones" class="col-md-4 col-form-label text-md-right">{{ __('Institución') }}</label>
                            <div class="col-md-6">
                                <select name="id_institucion" id="id_institucion" class="form-control" required>                                   
                                    @foreach($instituciones as $institucion)
                                        @if( $institucion->id_institucion == $item->id_institucion)
                                                <option value="{{ $institucion->id_institucion }}" selected="selected">{{ $institucion->nombre }}</option>
                                            @else
                                            <option value="{{ $institucion->id_institucion }}">{{ $institucion->nombre }}</option>
                                        @endif
                                    @endforeach
                                </select>                          
                                @error('id_institucion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Modificar') }}
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/1e8f374826.js" crossorigin="anonymous"></script>

<script>
    $(function () {
    $('#example1').datetimepicker();
    });
</script>
@endsection
