@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif


@section('hamburger')
    <span style="font-size:30px;cursor:pointer;" onclick="openNav()">&#9776; </span>
@endsection

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a class="menu" href="{{ url('/place') }}">Puestos</a>
  <a class="menu" href="{{ url('/favorite') }}">Favoritos</a>
  <a class="menu" href="{{ url('/addPlace') }}">Agregar Puesto</a>
  <a class="menu" href="{{ url('/profilep') }}">Perfil</a>
</div>

    <div class="container-fluid" style="height: 560px; overflow-y: auto;">
        @yield('main-content')
    </div>


@endsection

