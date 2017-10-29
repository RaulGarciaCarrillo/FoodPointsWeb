@extends('layouts.app')

@section('content')

<div ng-controller="ctrlPlace" class="container-fluid">

	<div class="col-md-3">
		
	</div>
	
	<div class="col-md-6" >
	    <div ng-repeat="place in places track by $index">
	        <h2 class="text-center">{[{place.placeName}]}</h2>
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

	        <img width="100%" src="data:image/png;base64,{[{place.image}]}" />
	        <p>{[{place.description}]}</p>
	    </div>
	</div>

	<div class="col-md-3">
		
		<h3>Tipos de comida</h3>
		<div class="checkbox" ng-repeat="foodType in foodTypes track by $index">
		  <label><input type="checkbox" ng-model="foodType.isChecked" ng-change="consultarPuestos(foodType)">{[{ foodType.name }]}</label>
		</div>

	</div>

</div>

@endsection
