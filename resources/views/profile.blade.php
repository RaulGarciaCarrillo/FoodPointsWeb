@extends ('home')

<style type="text/css">
	.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}


.form-group{}

.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

</style>

@section('main-content')

 @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
  
	<div class="col-md-3"></div>
	<div ng-controller="ctrlUser">
		 <div class="row">
	        <div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
	                <div class="panel-heading">Modificar Perfil</div>
	                <div class="panel-body">
	                    <form class="form-horizontal" name="myForm" novalidate>
	                        {{ csrf_field() }}

	                        <div class="col-md-4">
	                        	<div class=""> 
	                        		<img id='img-upload' width="200px"  height="200px" src="data:image/png;base64,{[{user.image}]}" class="img-responsive">
	                        	</div>

	                        </div>
	                        <div class="col-md-8">
	                        <div class="form-group">
						        	<label for="imgProfile" class="col-md-3 control-label">Imagen:</label>
						        	<div class="col-md-9">       
						                <label class="input-group-btn">
						                    <span class="btn btn-primary"style="position:absolute">
						                        Buscar <input type="file" style="display: none;" multiple="" id="file" class="file"aria-describedby="fileHelp">
						                    </span>
						                </label>
						                <input id="fileAux" type="text" class="form-control" readonly="" style="padding-left:96px">
						            </div>
					       	</div>

						    <div class="form-group">
						    	<label for="email" class="col-md-3 control-label">Correo:</label>
	                            <div class="col-md-9">
	                                <input id="email" type="email" class="form-control" name="email" ng-model="user.email" disabled="true">
	                            </div>
                            </div>

                            <div class="form-group">
	                            <label for="name" class="col-md-3 control-label">Nombre:</label>

	                            <div class="col-md-9">
	                                <input id="name" type="text" class="form-control" name="name" ng-model="user.name" required autofocus>

	                                @if ($errors->has('name'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('name') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                         <div class="form-group">
	                            <label for="password" class="col-md-3 control-label">Contraseña:</label>

	                            <div class="col-md-9">
	                                <input ng-model="newPassword" id="password" type="password" class="form-control" name="password" >

	                                @if ($errors->has('password'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label for="password-confirm" class="col-md-3 control-label">Confirmar contraseña:</label>

	                            <div class="col-md-9">
	                                <input ng-model="newPasswordConfirm" id="password-confirm" type="password" class="form-control" name="password_confirmation" >
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <div class="col-md-12">
	                                <button ng-click="actualizar()"
	                                		ng-disabled="myForm.$invalid"
	                                		class="btn btn-success">
	                                    Guardar	
	                                </button>
	                                <a class="btn btn-danger" href="{{ url('/place') }}">
	                                    Cancelar
	                                </a>
	                                	
									  <!-- Your share button code -->
									  <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Compartir</a></div>
	                            </div>
	                        </div>

						</div>
						</div>
	                        

	                    </form>
	                </div>
	            </div>
	        </div>
    	</div>
	</div>
 <!-- Bootstrap core JavaScript -->

@endsection

<script src="vendor/jquery/jquery.min.js"></script>

<script type="text/javascript">
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '145378952749171',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.10'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

/*FB.ui({
			    method: 'share',
			    picture:'http://miadventure.x10.mx/portadaMI2.png',
			    href:'http://miadventure.x10.mx/',
			    caption: 'Dead Hunting',
			    quote: "My Score: " + score,
			    hashtag: "#MiAdventure"
			  }, function(response){});
			  dialog2.dialog( "close" );	*/
</script>




