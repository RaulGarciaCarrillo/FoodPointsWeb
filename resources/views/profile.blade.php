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

#img-upload{
    width: 100%;
}

.form-group{}

</style>

@section('main-content')



 @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
  
	<div class="col-md-3"></div>
	<div ng-controller="ctrlUser">
		 <div class="row" ng-repeat="user in items track by $index">
	        <div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
	                <div class="panel-heading">Modificar Perfil</div>
	                <div class="panel-body">
	                    <form class="form-horizontal" method="" action=" ">
	                        {{ csrf_field() }}

	                        <div class="form-group">
	                        	<div class="col-md-4"> 
	                        		<img id='img-upload' width="200px"  height="200px" src="data:image/png;base64,{[{user.image}]}" style=""/>
	                        	</div>
						        <label for="imgProfile" class="col-md-3 control-label">Imagen:</label>
						        <div class="col-md-5">
						        <div class="input-group">
						           <input type="file" class="form-control-file" id="file" aria-describedby="fileHelp" onchange="angular.element(this).scope().getFile()" required>
						        </div>
						    </div>

						    <div style="margin-top: 6%">
						    <label for="email" class="col-md-3 control-label">Correo:</label>
	                            <div class="col-md-5">
	                                <input id="email" type="email" class="form-control" name="email" ng-value="user.email" disabled="true">
	                            </div>
                            </div>

                            <div style="margin-top: 12%;">
	                            <label for="name" class="col-md-3 control-label">Nombre:</label>

	                            <div class="col-md-5">
	                                <input id="name" type="text" class="form-control" name="name" ng-value="user.name" required autofocus>

	                                @if ($errors->has('name'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('name') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                         <div style=" margin-top: 18%">
	                            <label for="password" class="col-md-3 control-label">Contraseña:</label>

	                            <div class="col-md-5">
	                                <input id="password" type="password" class="form-control" name="password" >

	                                @if ($errors->has('password'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div>
	                            <label for="password-confirm" class="col-md-3 control-label">Confirmar contraseña:</label>

	                            <div class="col-md-5">
	                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
	                            </div>
	                        </div>
						</div>

	                        <div class="form-group">
	                            <div class="col-md-5 col-md-offset-7">
	                                <button type="submit" class="btn btn-success">
	                                    Guardar	
	                                </button>
	                                <button type="button" class="btn btn-danger">
	                                    Cancelar
	                                </button>
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


$(document).ready( function() {


	

    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
	});
</script>




