@extends('layouts.app')
@include('includes.head')

@section('content')

    <div class="container">
        <div class="row justify-content-center">            
            <div class="col-md-10 mb-4">
                <h1 >&nbsp;&nbsp;<i class="fas fa-calendar-check fa-2x"></i>
                <h2><b>Mi cuenta</b></h2>
                <h4>Aquí verás toda la información que nosotros tenemos sobre tí.</h4>
                <h6 font-weight="lighter">No tengas miedo de compartirnos tu información. Nosotros ponemos en ésta página toda la información que tenemos de tí. </h6>
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
                    <p>{{ Auth::user()->name }}</p>
                </div>
            </div>
        </div>
    </div>


<footer class="row">
    @include('includes.footer')
</footer>


@endsection