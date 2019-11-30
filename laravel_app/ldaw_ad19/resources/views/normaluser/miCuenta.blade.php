@extends('layouts.app')
@include('includes.head')

@section('content')

    <div class="container">
        <div class="row justify-content-center">            
            <div class="col-md-10 mb-4">
                <h1 >&nbsp;&nbsp;<i class="fas fa-user-circle fa-2x"></i>
                <h2><b>Mi cuenta</b></h2>
                <h4>Aquí verás toda la información que nosotros tenemos sobre tí.</h4>
                <h6 font-weight="lighter">No tengas miedo de compartirnos tu información. Nosotros ponemos en ésta página toda la información que tenemos de tí. </h6>
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
                <div class="row">
                    <div class="col">
                        <h4><i class="fas fa-user mb-5"></i><strong>&nbspNombre:&nbsp</strong>{{ Auth::user()->name }}</h4>
                        <h4><i class="fas fa-user mb-5"></i><strong>&nbspApellidos:&nbsp</strong>{{ Auth::user()->apellido_paterno }}&nbsp{{ Auth::user()->apellido_materno }}</h4>
                        <h4><i class="fas fa-hashtag mb-5"></i></i><strong>&nbspEdad:&nbsp</strong>{{ Auth::user()->edad }}</h4>
                    </div>
                    <div class="col">
                        <h4><i class="fas fa-envelope mb-5"></i><strong>&nbspCorreo:&nbsp</strong>{{ Auth::user()->email }}</h4>
                        <h4><i class="fas fa-city mb-5"></i><strong>&nbspCiudad:&nbsp</strong>{{ Auth::user()->ciudad }}</h4>
                        @foreach($ins as $item)
                            @if (Route::has('register'))
                                @if ($item->id_institucion == Auth::user()->id_institucion)
                                    <h4><i class="fas fa-university mb-5"></i><strong>&nbspInstitucion:&nbsp</strong>{{ $item->nombre }}</h4>
                                @endif
                            @endif
                        
                            
                        @endforeach
                        
                    </div>

                    
                    
            
                </div>
            </div>
        </div>
    </div>


<footer class="row">
    @include('includes.footer')
</footer>


@endsection