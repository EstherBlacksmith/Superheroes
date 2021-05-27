@include('layouts.head')

@include('layouts.navigation')
<div class=" container-fluid">
  <h1 class="text-muted">Héroes</h1>
  <div class="row">
    <div class="col col-1"> 
    </div>

    <div class="col col-5">      
      <div class="form-group text-white form-inline">
        <form action="{{ route('IndexView')}}" method="get">
          <label class="text-white" for="heroe_name">Nombre de super héroe</label>
          <input  class="form-control " type="text" name="heroe_name" placeholder="Busquemos por un nombre heróico...">    
          <button class="btn btn-light">Buscar</button>
        </form>
      </div>
      <div class="form-group text-white form-inline">

        <form action="{{ route('IndexView')}}" method="get">


          <label class="text-white" for="real_name">Nombre real</label>
          <input  class="form-control " type="text" name="real_name" placeholder="Busquemos por un nombre real...">    
          <button class="btn btn-light">Buscar</button>

        </form>
      </div>

    </div>
    <div class="col col-6">      
     <div class="form-group text-white form-inline">
      <form action="{{ route('IndexView')}}" method="get">
        <label class="text-white" for="alignment">Alineamientos</label>

        <select  class="form-control " name="alignment" >
          <option>Todos</option> 
          @foreach($alignments as $alignment) 
          <option value="{{$alignment['id']}}">{{$alignment['name']}}</option> 
          @endforeach 
        </select>
        <button class="btn btn-light">Filtrar</button>

      </form>
    </div>
    <div class="form-group text-white form-inline">

      <form action="{{ route('IndexView')}}" method="get">
       <label class="text-white" for="powers">Poderes</label>
       <select  class="form-control " name="powers">
        <option>Todos</option> 
        @foreach($powers as $power) 
        <option>{{$power['name']}}</option> 
        @endforeach 
      </select>
      <button class="btn btn-light">Filtrar</button>
    </form>
  </div>
  <div class="form-group text-white form-inline ">

    <form action="{{ route('IndexView')}}" method="get">
      <label class="text-white" for="organization">Organizaciones</label>
      <select  class="form-control" name="organization">
        <option>Todas</option> 
        @foreach($organizations as $organization) 
        <option>{{$organization['name']}}</option> 
        @endforeach 
      </select>
      <button class="btn btn-light">Filtrar</button>
    </form>
  </div>

</div>
</div>

<div class="row">
  <div class="col col-1"> 
  </div>
  <div class="col col-10">

   <table class="table table-striped table-light table-responsive-lg" id="superTable">
     <thead class="thead-dark">
      <tr>
        <!--When a header is clicked, run the sortTable function, with a parameter,
          0 for sorting by names, 1 for sorting by country: -->
          <th onclick="sortTable(0)">Apodo</th>
          <th onclick="sortTable(1)">Nombre real</th>
          <th onclick="sortTable(2)">Alineamiento</th>
          <th onclick="sortTable(3)">Puntos de vida</th>
          <th onclick="sortTable(4)">Fuerza</th>
          <th>Poderes </th>
          <th>Organizaciones</th>
                    <th>Editar</th>

          <th>Imagen</th>
          <th>Eliminar</th>


        </tr>
      </thead>

      @foreach ($heroes as $heroe)

      <tr>
       <td> {{$heroe['heroe_name']}} </td>
       <td>{{$heroe['real_name']}} </td>
       @foreach($alignments as $alingment)
       @if ($alingment['id'] == $heroe['alignment_id'])
       <td>{{$alingment['name']}}</td>
       @break
       @endif   
       @endforeach 
       <td>{{$heroe['vital_points']}} </td>
       <td>{{$heroe['strength']}} </td>
       <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#poderesModal_{{$heroe['id']}}">
        Poderes
      </button>
    </td>

    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#organizationsModal_{{$heroe['id']}}">
      Organizaciones
    </button></td>

    <td><button type="button" class="btn btn-warning" ><a href="{{route('updateHeroe',$heroe['id'])}}" class="fas fa-edit"></a></button></td>
    <td><a href="{{route('imageUpload',$heroe['id'])}}" class="">
    @if(isset($heroe->image_name))
      <img src="{{ asset('images/'.$heroe->image_name)}}" alt="{{$heroe->heroe_name}}" style="width: 15%; height; 15%;" >
      @else
      <img class="rounded img-fluid img-thumbnail" class="card-img-top" id="heroe_image" style="width: 50%:" src="{{asset('heroe_icons/desconocido.svg')}}"
            alt="swordwoman"
            height="30"
            width="40" />
       @endif
       </a>
       </td>
    <td><button type="button" class="btn btn-danger" ><a href="{{route('deleteHeroe',$heroe['id'])}}"  class="fas fa-trash-alt"></a></button></td>
   
  </tr>

  @endforeach 

</table>
{{ $heroes->links() }}

@foreach ($heroes as $heroe)

<!-- Modal Poderes -->
<div class="modal fade" id="poderesModal_{{$heroe['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Poderes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
        <dl>
         @foreach($powersbyHeroe as $powers)

         @foreach($powers as $power)	
         @if ($power['pivot']['heroe_id'] == $heroe['id'])
         <dt>{{$power['name']}}</dt> 
         <dd>{{$power['description']}}</dd>
         @endif
         @endforeach 
         @endforeach 
         
       </dl>

     </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>
</div>



<!-- Modal Organizaciones -->
<div class="modal fade" id="organizationsModal_{{$heroe['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Organizaciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       @foreach($organizationsbyHeroe as $organizations)

       @foreach($organizations as $organization)	
       @if ($organization['pivot']['heroe_id'] == $heroe['id'])
       <dt>{{$organization['name']}}</dt> 
       <dd>{{$organization['description']}}</dd>
       @endif
       @endforeach 
       @endforeach 


       
     </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>
</div>

@endforeach 

@if (\Session::has('errors'))
<div class="alert alert-danger">
  <ul>
    <li>{!! \Session::get('errors') !!}</li>
  </ul>
</div>
@endif

</div>
</div>
</div>
@include('scripts.superTableScript')
