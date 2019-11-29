@extends('layouts.app')
@include('includes.head')

@section('content')
<div class="container">
    <header class="row">
    </header>
    <div id="main" class="row">
        <!-- sidebar content -->
        <div id="sidebar" class="col-md-4">
            @include('includes.sidebar')
        </div>

        <div id="content" class="col-md-8">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Dashboard</div>

                <div class="card-body">
                @if(Auth::user()->hasRole('Administrador'))
                    <div>Acceso como administrador</div>
                @else
                        <div>Acceso usuario</div>
                @endif
             
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="row">
        @include('includes.footer')
    </footer>
</div>

@endsection
