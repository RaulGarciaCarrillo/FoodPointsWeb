@extends('home')

<style type="text/css">
	[v-cloak] {
  display: none;
}
</style>

@section('main-content')

<div id="app">
        <li class="list-group-item" v-for="task in tasks">
        	@{{task.name}}
        </li>
       <button v-on:click="greet">Greet</button>
		    </div>

<script> 
new Vue ({
    el: '#app',
    data: {
     tasks:[
     {
     	name:'hola'
     },
     {
     	name:'hola2'
     },
     {
     	name:'hola3'
     }
     ]
    },
    methods: {
    greet: function (event) {
      // `this` inside methods points to the Vue instance
      alert('Hello ' + this.name + '!')
      // `event` is the native DOM event
      if (event) {
        alert(event.target.tagName)
      }
    }
  }
});
</script>


@endsection



