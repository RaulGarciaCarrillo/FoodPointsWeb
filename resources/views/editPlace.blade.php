@extends ('home')

<style>
  
hr {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 0;
    border-top: 1px solid #FFFFFF;
}
a {
    color: #82b440;
    text-decoration: none;
}

textarea {
    resize: none;
}

.blog-comment::before,
.blog-comment::after,
.blog-comment-form::before,
.blog-comment-form::after{
    content: "";
  display: table;
  clear: both;
}

.blog-comment{
    padding-left: 15%;
  padding-right: 15%;
}

.blog-comment ul{
  list-style-type: none;
  padding: 0;
}

.blog-comment img{
  opacity: 1;
  filter: Alpha(opacity=100);
  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
       -o-border-radius: 4px;
      border-radius: 4px;
}

.blog-comment img.avatar {
  position: relative;
  float: left;
  margin-left: 0;
  margin-top: 0;
  width: 65px;
  height: 65px;
}

.blog-comment .post-comments{
  border: 1px solid #eee;
    margin-bottom: 20px;
    margin-left: 85px;
  margin-right: 0px;
    padding: 10px 20px;
    position: relative;
    -webkit-border-radius: 4px;
       -moz-border-radius: 4px;
         -o-border-radius: 4px;
        border-radius: 4px;
  background: #fff;
  color: #6b6e80;
  position: relative;
}

.blog-comment .meta {
  font-size: 13px;
  color: #aaaaaa;
  padding-bottom: 8px;
  margin-bottom: 10px !important;
  border-bottom: 1px solid #eee;
}

.blog-comment ul.comments ul{
  list-style-type: none;
  padding: 0;
  margin-left: 85px;
}

.blog-comment-form{
  padding-left: 15%;
  padding-right: 15%;
  padding-top: 40px;
}

.blog-comment h3,
.blog-comment-form h3{
  margin-bottom: 40px;
  font-size: 26px;
  line-height: 30px;
  font-weight: 800;
}
</style>

@section('main-content')
 @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

<div ng-controller="ctrlPlaceEdit" class="container-fluid" ng-init="initMaps()">

    <div class="col-md-1">
        
    </div>
    
    <div class="col-md-4" >
       <form name="myForm" novalidate>
           <div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Nombre del puesto</label>
              <div class="col-10">
                <input class="form-control" type="text" ng-model="place.name" required>
              </div>
            </div>
            
            <div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Descripci&oacute;n</label>
              <div class="col-10">
                <input class="form-control" type="text" ng-model="place.description" required>
              </div>
            </div>

            <div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Direcci&oacute;n</label>
              <div class="col-10">
                <input class="form-control" type="text" ng-model="place.address" disabled required>
              </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Tipos de comida</label>
                <div class="checkbox" ng-repeat="foodType in foodTypes track by $index">
              <label><input type="checkbox" ng-model="foodType.isChecked" ng-change="consultarPuestos(foodType)">{[{ foodType.name }]}</label>
                </div>
            </div>

            <div class="form-group row">
                <label for="exampleInputFile">Fotograf&iacute;a del puesto</label>
               
                <input type="file" class="form-control-file" id="file" aria-describedby="fileHelp" onchange="angular.element(this).scope().getFile()" required>
                 <img id='img-upload' width="200px"  height="200px"  style=""/>
            </div>

            <button type="submit"
                     ng-click="agregar()"
                     
                     class="btn btn-success"
                     ng-disabled="myForm.$invalid">
                 Guardar
            </button>
            <button type="button" class="btn btn-danger">
                  Cancelar
            </button>
        </form>
    </div>

    <div class="col-md-6"  >        
        <div id="map" style="width: 100%; height: 500px; border: 1px solid #DD1818;"></div>
    </div>

    <div class="col-md-1">

    </div>


<div class="container bootstrap snippet">
    <div class="row">
    <div class="col-md-12">
        <div class="blog-comment">
         <div class="panel-heading">Comentarios</div>
        <ul class="comments">
        <li class="clearfix">
          <img src="https://bootdey.com/img/Content/user_1.jpg" class="avatar" alt="">
          <div class="post-comments">
              <p class="meta">Dec 18, 2014 <a href="#">JohnDoe</a> says : <i class="pull-right"></i></p>
              <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Etiam a sapien odio, sit amet
              </p>
          </div>
        </li>
        <li class="clearfix">
          <img src="https://bootdey.com/img/Content/user_2.jpg" class="avatar" alt="">
          <div class="post-comments">
              <p class="meta">Dec 19, 2014 <a href="#">JohnDoe</a> says : <i class="pull-right"></i></p>
              <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Etiam a sapien odio, sit amet
              </p>
          </div>
        </li>
        </ul>
        <div class="comments">
           <img src="https://bootdey.com/img/Content/user_1.jpg" class="avatar" alt="">
          <div class="post-comments" style="padding-bottom: 7%;">
              <p class="meta">Dec 18, 2014 <a href="#">JohnDoe</a> says : <i class="pull-right"></i></p>
              <textarea class="form-control" placeholer="Message">
              </textarea>
               <button type="button" style="margin-top: 1%"
                     ng-click=""
                     class="btn btn-success pull-right">
                 Comentar
              </button>
          </div>
         </div>
      </div>
    </div>
  </div>
</div>

</div>
@endsection
