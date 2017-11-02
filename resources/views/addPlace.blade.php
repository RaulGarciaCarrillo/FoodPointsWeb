@extends('home')

@section('main-content')

<div ng-controller="ctrlPlaceAdd" class="container-fluid" ng-init="initMaps()">

	<div class="col-md-1">
		
	</div>
	
	<div class="col-md-4" >
	   <form name="myForm" novalidate>
		   <div class="form-group row">
			  <label for="example-text-input" class="col-2 col-form-label">Nombre Puesto</label>
			  <div class="col-10">
			    <input class="form-control" type="text" ng-model="place.name" required>
			  </div>
			</div>
			
			<div class="form-group row">
			  <label for="example-text-input" class="col-2 col-form-label">Descripci&oacute;n</label>
			  <div class="col-10">
			    <input class="form-control" type="text" ng-model="place.description" required>
			  </div>
			</div>

			<div class="form-group row">
			  <label for="example-text-input" class="col-2 col-form-label">Direcci&oacute;n</label>
			  <div class="col-10">
			    <input class="form-control" type="text" ng-model="place.address" disabled required>
			  </div>
			</div>

			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">Tipos de comida</label>
				<div class="checkbox" ng-repeat="foodType in foodTypes track by $index">
			  <label>
				  <input 
						 type="checkbox" 
						 ng-model="foodType.isChecked" 
						 ng-change="actualizarTipos(foodType)">{[{ foodType.name }]}
			  </label>
				</div>
			</div>

			<div class="form-group row">
			    <label for="exampleInputFile">Fotograf&iacute;a del Puesto</label>
			    <input type="file" class="form-control-file" id="file" aria-describedby="fileHelp" required ng-model="filename" valid-file>
			</div>

			<button type="submit"
	                 ng-click="agregar()"
	                 style="width: 25%; "
	                 class="btn btn-primary"
	                 ng-disabled="myForm.$invalid">
	             Agregar
	        </button>
        </form>
	</div>

	<div class="col-md-6"  >		
    	<div id="map" style="width: 100%; height: 500px; border: 1px solid #DD1818;"></div>
	</div>

	<div class="col-md-1">

	</div>

</div>
@endsection
