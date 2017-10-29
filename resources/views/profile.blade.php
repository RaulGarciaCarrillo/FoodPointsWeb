@extends('home')

@section('main-content')

<div id="app"> @{{ message }} </div>

<script>
    new Vue({
      el: '#app',
      data: {
        message: 'Hello Vue.js!'
      }
    });
</script>

@endsection



