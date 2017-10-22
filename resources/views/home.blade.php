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

    <div class="container-fluid">


        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div>
                <h2 class="text-center">Tacos Pipe</h2>
                <div class="col-md-6 text-center">

                    <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                    <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                    <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                    <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                    <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                    </div>
                <div class="col-md-6 text-center">
                  <i class="fa fa-heart-o fa-2x" aria-hidden="true"></i>
                </div>

                <img width="100%" src="http://viajerosblog.com/wp-content/uploads/2012/10/Puesto-Comida-Praga.jpg" />
                <p>Descripcion del puesto de comida tacos, hamburguesas, pistaches, cacahuates</p>
            </div>
            <div>
                <h2 class="text-center">Tacos Pipe</h2>
                <div class="col-md-6 text-center">

                    <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                    <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                    <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                    <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                    <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                    </div>
                <div class="col-md-6 text-center">
                  <i class="fa fa-heart-o fa-2x" aria-hidden="true"></i>
                </div>

                <img width="100%" src="http://viajerosblog.com/wp-content/uploads/2012/10/Puesto-Comida-Praga.jpg" />
                <p>Descripcion del puesto de comida tacos, hamburguesas, pistaches, cacahuates</p>
            </div>
        </div>
        <div class="col-md-3"></div>
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