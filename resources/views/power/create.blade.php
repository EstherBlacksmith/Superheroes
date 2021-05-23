

<form action="{{route('createPowerStore')}}" method="post">
	@csrf
  
  <div class="form-group">
      <label for="name">Nombre</label>
      <input type="text" name="name" class="form-control" placeholder="Nombre" id="name">
    </div>
  <div class="form-group">
    <label for="description">Descripción</label>
    <input type="text" name="description" class="form-control" placeholder="Descripción" id="description">
  </div>  
  <div class="form-group">
    <label for="damage_points">Puntos de daño</label>
    <input type="text" name="damage_points" class="form-control" placeholder="Puntos de daño" id="damage_points">
  </div>  

  <button type="submit" class="btn btn-primary">Crear</button>
  
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