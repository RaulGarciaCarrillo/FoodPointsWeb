@extends('home')

@section('main-content')

<style type="text/css">
	.trueClass{
		background: red;
	}

	.falseClass{
		background: green;
	}
</style>

<div ng-controller="ctrlPlace" class="container-fluid">

	<div class="col-md-1">
		
	</div>
	
	<div class="col-md-7" >
	    <div ng-repeat="place in places track by $index">
	        <h2 class="text-center">{[{place.placeName}]}</h2>
	        <div class="col-md-6 text-center">
	            <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
	            <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
	            <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
	            <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
	            <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
	            </div>
	        <div ng-class="falseClass" class="col-md-6 text-center">
	          <i style="cursor:pointer" ng-click="updateFavorite(place)" ng-class="place.isFavorite ? 'fa fa-2x fa-heart' : 'fa fa-2x fa-heart-o'" aria-hidden="true"></i>
	        </div>

	        <a ><img  ng-click="verPuesto(place.id)" width="100%" src="data:image/png;base64,{[{place.image}]}" /></a>
	        <p style="font-size: 22px; padding: 10px; background:white; border: 1px solid #d6d6d6;"> {[{place.description}]}</p>
	    </div>
	</div>

	<div class="col-md-4">
	 	<div class="row">
	 		<h3>Tipos de comida</h3>
        	<ul class="col-md-12">
	            <li class="thumbnail col-md-3 col-xs-3" ng-repeat="foodType in foodTypes track by $index" style="margin-bottom: 1%">
	            	<input type="checkbox" ng-model="foodType.isChecked" ng-change="consultarPuestos(foodType)">
	                <img ng-src="{[{foodType.src}]}" alt="{[{ foodType.name }]}" title="{[{ foodType.name }]} " height="200" width="200">
	            </li>
        	</ul>
      	</div>
	</div>

</div>

@endsection
