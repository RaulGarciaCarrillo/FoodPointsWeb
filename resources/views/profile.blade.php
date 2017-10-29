@extends('layouts.app')
@section('content')


	<div class="col-md-3"></div>
	<div ng-controller="ctrlUser">
	    <div ng-repeat="x in items track by $index">{[{x.name}]}</div>
	</div>



@endsection



