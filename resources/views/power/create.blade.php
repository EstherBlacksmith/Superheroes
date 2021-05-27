@include('layouts.head')

@include('layouts.navigation')
<div class="container">
  <div class="row">
    <div class="col col-5">

      <h1 class="text-muted">Crear poderes</h1>

      <form action="{{route('createPowerStore')}}" method="post">
       @csrf
       
       <div class="form-group text-white">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" placeholder="Nombre" id="name" value="{{old('name')}}">
      </div>
      <div class="form-group text-white">
        <label for="description">Descripción</label>
        <input type="text" name="description" class="form-control" placeholder="Descripción" id="description" value="{{old('description')}}">
      </div>  
      <div class="form-group text-white">
        <label for="damage_points">Puntos de daño</label>
        <input type="text" name="damage_points" class="form-control" placeholder="Puntos de daño" id="damage_points" value="{{old('damage_points')}}">
      </div>  

      <button type="submit" class="btn btn-light">Crear</button>
      
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
  </div>
</div>
</div>