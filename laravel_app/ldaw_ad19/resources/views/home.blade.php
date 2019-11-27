@extends('layouts.app')
@include('includes.head')

@section('content')
<div class="container">
    <header class="row">
        @include('includes.header')
    </header>
    <div id="main" class="row">
        <!-- sidebar content -->
        <div id="sidebar" class="col-md-4">
            @include('includes.sidebar')
        </div>
        <ul class="list-group">
  <li class="list-group-item">Cras justo odio</li>
  <li class="list-group-item">Dapibus ac facilisis in</li>
  <li class="list-group-item">Morbi leo risus</li>
  <li class="list-group-item">Porta ac consectetur ac</li>
  <li class="list-group-item">Vestibulum at eros</li>
</ul>
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
