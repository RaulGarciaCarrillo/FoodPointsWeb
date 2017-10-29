@extends('layouts.app')
@section('content')

<div class="col-md-3"></div>
<div ng-controller="ctrlPlace">
    <div ng-repeat="x in items track by $index">{[{x.name1}]}</div>
</div>


@endsection
