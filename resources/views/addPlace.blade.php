@extends('home')

@section('main-content')

<div ng-controller="ctrlPlaceAdd" class="container-fluid" ng-init="initMaps()">

	<div class="col-md-1">
		
	</div>
	
	<div class="col-md-4" >
	   <form name="myForm" novalidate>
		   <div class="form-group row">
			  <label for="example-text-input" class="col-2 col-form-label">Nombre del puesto:</label>
			  <div class="col-10">
			    <input class="form-control" type="text" ng-model="place.name" required>
			  </div>
			</div>
			
			<div class="form-group row">
			  <label for="example-text-input" class="col-2 col-form-label">Descripci&oacute;n:</label>
			  <div class="col-10">
			    <input class="form-control" type="text" ng-model="place.description" required>
			  </div>
			</div>

			<div class="form-group row">
			  <label for="example-text-input" class="col-2 col-form-label">Direcci&oacute;n:</label>
			  <div class="col-10">
			    <input class="form-control" type="text" ng-model="place.address" disabled required>
			  </div>
			</div>

			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">Tipos de comida:</label>
			  	<ul class="col-md-12">
	            <li class="thumbnail col-md-3 col-xs-3" ng-repeat="foodType in foodTypes track by $index" style="margin-bottom: 1%">
	            	<input type="checkbox" ng-model="foodType.isChecked" ng-change="actualizarTipos(foodType)">
	                <img ng-src="{[{foodType.src}]}" alt="{[{ foodType.name }]}" title="{[{ foodType.name }]} " height="200" width="200">
	            </li>
        	</ul>
			</div>

			<div class="form-group row">
			    <label for="exampleInputFile">Fotograf&iacute;a del puesto:</label>
			    <div class="input-group">
	                <label class="input-group-btn">
	                    <span class="btn btn-primary">
	                        Buscar… <input type="file" style="display: none;" multiple="" id="file" class="file"aria-describedby="fileHelp" ng-model="filename" valid-file>
	                    </span>
	                </label>
	                <input id="fileAux" type="text" class="form-control" readonly="">
	            </div>
			</div>


			<button type="submit"
	                 ng-click="agregar()"
	                 class="btn btn-success"
	                 ng-disabled="myForm.$invalid">
	             Agregar
	        </button>
            <a class="btn btn-danger" href="{{ url('/place') }}">
                Cancelar
            </a>
        </form>
	</div>

	<div class="col-md-6"  >		
    	<div id="map" style="width: 100%; height: 500px; border: 1px solid #DD1818;"></div>
	</div>

	<div class="col-md-1">

	</div>

</div>
@endsection
