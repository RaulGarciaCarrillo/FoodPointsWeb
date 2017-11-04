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

		         <a href="{{ url('/viewPlace') }}"><img width="90%" src="data:image/png;base64,{[{place.image}]}" /></a>
		        <p id="description">{[{place.description}]}</p>
		    </li>
		</ul>
	</div>
</div>

@endsection