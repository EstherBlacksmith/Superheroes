@include('layouts.head')

@include('layouts.navigation')
<div class="container">
    <div class="row">

        <div class="col col-12">
          <h1 class="text-muted">Crear héroes</h1>
        </div>
      </div>
  <div class="row">

    <div class="col col-5">
    

      <form action="{{route('createHeroeStore')}}" method="post">
        <div class="form-group text-white">
          @csrf

          <label for="heroe_name">Apodo</label>
          <input type="text" class="form-control" name="heroe_name" placeholder="Apodo" id="heroe_name" value="{{old('heroe_name')}}">

          <label for="real_name">Nombre real</label>
          <input type="text" class="form-control" name="real_name" placeholder="Nombre real" id="real_name" value="{{old('real_name')}}">

          <label for="alignment">Alineamiento</label>
          <select class="form-control"  name="alignment" id="alignment" value="{{old('alignment')}}">
            @foreach($alignments as $alignment)
              @if (old('alignment') == $alignment->id)
                <option value="{{ $alignment->id }}" selected>{{ $alignment->name }}</option>
              @else
                <option value="{{$alignment->id}}">{{$alignment->name}}</option>
              @endif
           @endforeach
         </select>

        <label for="organization">Organizaciones</label>
        <select multiple class="form-control" name="organization" id="organization" value="{{old('organization')}}">
         @foreach($organizations as $organization)
            @if (old('organization') == $organization->id)
              <option value="{{ $organization->id }}" selected>{{ $organization->name }}</option>
            @else
              <option value="{{$organization->id}}">{{$organization->name}}</option>
            @endif
         @endforeach
       </select>
     </div>
   </div>
   <div class="col col-5">
     <div class="form-group text-white">

      <label for="power">Poderes</label>
      <select multiple class="form-control"  name="power" id="power">
        @foreach($powers as $power)
          @if (old('power') == $power->id)
            <option value="{{ $power->id }}" selected>{{ $power->name }}</option>
          @else
            <option value="{{ $power->id }}">{{$power->name}}</option>
          @endif
        @endforeach
      </select>

      <label for="vital_points">Puntos de vida</label>
      <input type="text" class="form-control" name="vital_points" placeholder="Puntos de vida" id="vital_points" value="{{old('vital_points')}}">
    
      <label for="strength">Fuerza</label>
      <input type="text" class="form-control" name="strength" placeholder="Fuerza" id="strength" value="{{old('strength')}}">
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

