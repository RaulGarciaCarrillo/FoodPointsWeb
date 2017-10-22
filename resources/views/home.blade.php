@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif



<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">Puestos</a>
  <a href="#">Favoritos</a>
  <a href="#">Agregar Puesto</a>
  <a href="#">Contact</a>
</div>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

    <div class="container-fluid" style="height: 80%; overflow-y: auto;">
        @yield('main-content')
    </div>


@endsection

 <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="css/navbar.css"></script>
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
   <script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
    </script>
    </script>