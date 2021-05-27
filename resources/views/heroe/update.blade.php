@include('layouts.head')

@include('layouts.navigation')
<div class="container">
  <div class="row">
    <div class="col col-5">
      <h1 class="text-muted">Actualizar héroes</h1>

      @php ($heroeOrganizations = array())
      @foreach($heroe['organizations'] as $heroeOrganization)
      @php (array_push($heroeOrganizations, $heroeOrganization['id']))
      @endforeach

      @php ($heroePowers = array())
      @foreach($heroe['powers'] as $heroePower)
      @php (array_push($heroePowers, $heroePower['id']))
      @endforeach
 
            <form action="{{route('updateHeroeStore')}}" method="post">
              <div class="form-group text-white">
                @csrf
                <input type="hidden" name="id" value="{{$heroe->id}}" >
                
             
                <label for="heroe_name">Apodo</label>
                <input type="text" class="form-control disabled" name="heroe_name" placeholder="Apodo" id="heroe_name" value="{{$heroe->heroe_name}}">
              </div>
              <div class="form-group text-white">
                <label for="real_name">Nombre real</label>
                <input type="text" class="form-control" name="real_name" placeholder="Nombre real" id="real_name" value="{{$heroe->real_name}}">
              </div>

              <div class="form-group text-white">
                <label for="alignment">Alineamiento</label>
                <select class="form-control"  name="alignment" id="alignment" value="{{$heroe->alignment}}">

                 @foreach($alignments as $alignment)

                 @if( $heroe['alignment_id'] == $alignment['id'] )

                 <option selected  value="{{$alignment['id']}}">{{$alignment['name']}}</option>
                 @else

                 <option value="{{$alignment['id']}}">{{$alignment['name']}}</option>

                 @endif

                 @endforeach
               </select>
             </div>


             <div class="form-group text-white">
              <label for="organization">Organizaciones</label>
              <select multiple class="form-control" name="organization[]" id="organization" value="{{$heroe->organization}}">
                @foreach($organizationsAll as $organization)
                @if( in_array($organization['id'], $heroeOrganizations) )
                <option selected value="{{$organization['id']}}">{{$organization['name']}}</option>
                @else
                <option value="{{$organization['id']}}">{{$organization['name']}}</option>
                @endif
                @endforeach
              </select>
            </div>

            <div class="form-group text-white">
              <label for="power">Poderes</label>
              <select multiple class="form-control"  name="power[]" id="power" value="{{ old('power') }}">
                @foreach($powersAll as $power)
                @if( in_array($power['id'], $heroePowers ))
                <option selected value="{{$power['id']}}">{{$power['name']}}</option>
                @else
                <option value="{{$power['id']}}">{{$power['name']}}</option>
                @endif
                @endforeach
              </select>
            </div>

            <div class="form-group text-white">
              <label for="vital_points">Puntos de vida</label>
              <input type="text" class="form-control" name="vital_points" placeholder="Puntos de vida" id="vital_points"  value="{{$heroe->vital_points}}">
            </div>

            <div class="form-group text-white">
              <label for="strength">Fuerza</label>
              <input type="text" class="form-control" name="strength" placeholder="Fuerza" id="strength" value="{{$heroe->strength}}">
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