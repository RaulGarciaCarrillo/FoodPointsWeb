@extends ('home')

<style>
  
hr {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 0;
    border-top: 1px solid #FFFFFF;
}

textarea{
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
    padding-left: 2%;
    padding-right: 2%;
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

h2 {
   text-align: center;
}
</style>

@section('main-content')
 @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

<div ng-controller="ctrlPlaceView" class="container-fluid" ng-init="initMaps()">

    <div class="col-md-12">
       <h2 class="text-center">{[{place.placeName}]}</h2>
    </div>

    <div class="col-md-1"> 
    </div>
    
    <div class="col-md-4"> 
       <div class="row">
        <label for="example-text-input" class="col-2 col-form-label">Tipos de comida:</label>
        <ul class="col-md-12">
            <li class="thumbnail col-md-3 col-xs-3" ng-repeat="foodType in foodTypes track by $index" style="margin-bottom: 1%">
                <img ng-src="{[{foodType.src}]}" alt="{[{ foodType.name }]}" title="{[{ foodType.name }]} " height="200" width="200">
            </li>
        </ul>
      </div>

      <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Direcci&oacute;n:</label>
        <div id="map" style="width: 97%; height: 50%; border: 1px solid #DD1818;"></div>
        <div class="col-9">
          <textarea class="form-control" type="text" ng-model="place.address"  style="width:97%" readonly> 
          </textarea>
        </div>
      </div>

    </div>

    <div class="col-md-6"> 
      <div class="form-group row">       
        <label for="exampleInputFile">Fotograf&iacute;a del puesto:</label>
          <div>
           <img id='img-upload' width="100%"  height="400px" src="data:image/png;base64,{[{place.image}]}" style=""/>
          </div>
        </div>  

      <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Descripci&oacute;n:</label>
        <div class="col-10">
          <textarea class="form-control" ng-model="place.description" readonly></textarea>
        </div>
      </div>
    </div>

    <div class="col-md-1">
    </div>


<div class="container bootstrap snippet">
    <div class="row">
    <div class="col-md-12">
        <div class="blog-comment">
         <div class="panel-heading">Comentarios</div>
        <ul class="comments">
        <li class="clearfix" ng-repeat="comment in comments track by $index">
          <img src="data:image/png;base64,{[{comment.userimage}]}" class="avatar">
          <div class="post-comments">
              <p class="meta">{[{comment.date}]}, <strong> {[{comment.user}]} </strong> dice: <i class="pull-right"></i></p>
              <p>
                  {[{comment.comment}]}
              </p>
          </div>
        </li>
        </ul>
        <div class="comments">
           <img src="https://bootdey.com/img/Content/user_1.jpg" class="avatar" alt="">
          <div class="post-comments" style="padding-bottom: 7%;">
            <p class="meta"> <span id="date"></span> <strong> JohnDoe </strong> dice: <i class="pull-right"></i></p>
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

<script type="text/javascript">
  n =  new Date();
  y = n.getFullYear();
  m = n.getMonth() + 1;
  d = n.getDate();
  document.getElementById("date").innerHTML = y + "-" + m + "-" + d;
</script>
@endsection
