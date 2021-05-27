@include('layouts.head')

@include('layouts.navigation')
<div class="container">
    <h1 class="text-muted">Dale una imagen a tu héroe</h1>

    <div class="row">

    <div class="col col-5">
        <div class="container">
            @if($heroe->image_name)

            <h3 class="text-white">Imagen actual</h3>
            
            <form action="{{ route('deleteImage') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="{{$heroe->image_name}}" name="imageName" id="imageName">
                <input type="hidden" value="{{$heroe->id}}" name="heroe_id" id="heroe_id">
                @csrf                                  
                <div class="col-md-6">
                    <button type="submit" class="btn btn-danger" ><a class="fas fa-trash-alt"></a></button>
                </div>           
            </form>
        </div>

        <img class="rounded img-fluid img-thumbnail" style="width: 70%;" src="{{ asset('images/'.$heroe->image_name)}}">
        @endif

        <div class="panel panel-primary">

          <div class="panel-body">

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>


            @endif

            @if(session('error'))
            <div class="alert alert-danger">
              <strong>Whoops!</strong> Parece que ha habido algún problema con la imagen.
              <ul>
               <li> {{session('error')}}</li>

           </ul>
       </div>
       @endif             

      
      <div class="form-group">
       <form action="{{ route('imageUploadStore') }}" method="POST" enctype="multipart/form-data">
           @csrf
            <input type="file" name="image" class="form-control">                  
            <input type="hidden" name="heroe_id" value="{{$heroe->id}}">
            <div class="col-md-6">
                <button type="submit" class="btn btn-success">Subir imagen</button>
            </div>
      
        </form>
</div>



</div>
</div>
</div>
</div>
</div>
</div>