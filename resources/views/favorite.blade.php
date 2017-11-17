@extends ('home')

<style></style>

@section('main-content')
 @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

<div ng-controller="ctrlFavorite" class="container-fluid">
	<div class="row">
		<ul class="col-md-12">
		    <li class="thumbnail col-md-4 col-xs-8" ng-repeat="place in places track by $index">
		        <h2 class="text-center">{[{place.placeName}]}</h2>
		        <div class="col-md-12 text-center">
		          <i style="padding: 10px;" class="fa fa-heart fa-3x" aria-hidden="true"></i>
		        </div>
		         <a ><img ng-click="verPuesto(place.id)" width="100%" src="data:image/png;base64,{[{place.image}]}" /></a>
		        <p id="description">{[{place.description}]}</p>
		    </li>
		</ul>
	</div>
</div>

@endsection