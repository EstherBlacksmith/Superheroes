@include('layouts.head')

@include('layouts.navigation')
<div class="container">
  <div class="row">
    <div class="col col-5">
      <h1 class="text-white">Actualizar alineamientos</h1>

      <form action="{{route('updateAlignmentStore')}}" method="post">
       @csrf
       <input type="hidden" value="{{$alignment->id}}" name="id" id="id">
       <div class="form-group text-white">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" placeholder="Nombre" id="name" value="{{$alignment->name}}">
      </div>
      <div class="form-group text-white">
        <label for="description">Descripción</label>
        <input type="text" name="description" class="form-control" placeholder="Descripción" id="description" value="{{$alignment->description}}">
      </div>  

      <button type="submit" class="btn btn-light">Actualizar</button>
      
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