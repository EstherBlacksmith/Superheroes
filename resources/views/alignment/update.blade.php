<form action="{{route('updateAlignmentStore')}}" method="post">
	@csrf
     <input type="hidden" value="{{$alignment['id']}}" name="id" id="id">
  <div class="form-group">
      <label for="name">Nombre</label>
      <input type="text" name="name" class="form-control" placeholder="Nombre" id="name" value="{{$alignment['name']}}">
    </div>
  <div class="form-group">
    <label for="description">Descripción</label>
    <input type="text" name="description" class="form-control" placeholder="Descripción" id="description" value="{{$alignment['description']}}">
  </div>  

  <button type="submit" class="btn btn-primary">Actualizar</button>
  
</form>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif