<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
    
<body>
<div class="container">
    @if($heroe->image_name)
        <h3>Imagen actual</h3>
        <img class="rounded img-fluid img-thumbnail" style="width: 50%:" src="{{ asset('images/'.$heroe->image_name)}}">
    @endif

    <div class="panel panel-primary">
      <div class="panel-heading"><h2>Dale una imagen a tu héroe</h2></div>
      <div class="panel-body">
     
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @php $sessionImage = Session::get('image') ; @endphp
        <img src="{{ asset('images/'.$sessionImage)}}")>
     
        @endif

        @if(session('error'))
         <div class="alert alert-danger">
                  <strong>Whoops!</strong> Parece que ha habido algún problema con la imagen.
                <ul>
           <li> {{session('error')}}</li>

              </ul>
            </div>
        @endif              



        <form action="{{ route('imageUploadStore') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <input type="hidden" name="heroe_id" value="{{$heroe->id}}">
                <div class="col-md-6">
                    <input type="file" name="image" class="form-control">
                </div>
               
     
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Subir imagen</button>
                </div>
     
            </div>
        </form>
    
      </div>
    </div>
</div>
</body>
  
</html>