
<form action="{{route('createHeroeStore')}}" method="post">
  <div class="form-group">
      @csrf

      <label for="heroe_name">Apodo</label>
      <input type="text" class="form-control" name="heroe_name" placeholder="Apodo" id="heroe_name">
    </div>
  <div class="form-group">
    <label for="real_name">Nombre real</label>
    <input type="text" class="form-control" name="real_name" placeholder="Nombre real" id="real_name">
  </div>

  <div class="form-group">
    <label for="alignment">Alineamiento</label>
    <select class="form-control"  name="alignment" id="alignment">
     @foreach($alignments as $alignment)
      <option value="{{$alignment['id']}}">{{$alignment['name']}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="organization">Organizaciones</label>
    <select multiple class="form-control" name="organization[]" id="organization">
     @foreach($organizations as $organization)
      <option value="{{$organization['id']}}">{{$organization['name']}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="power">Poderes</label>
    <select multiple class="form-control"  name="power[]" id="power">
      @foreach($powers as $power)
      <option value="{{$power['id']}}">{{$power['name']}}</option>
      @endforeach
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  
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