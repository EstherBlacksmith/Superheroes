@include('layouts.head')
<body>

@include('layouts.navigation')

<form action="{{ route('IndexView')}}" method="get">
  <label for="alignment">Alineamientos</label>

  <select name="alignment">
    <option>Todos</option> 
    @foreach($alignments as $alignment) 
      <option value="{{$alignment['id']}}">{{$alignment['id']}} {{$alignment['name']}}</option> 
    @endforeach 
  </select>
   <button>Filtrar</button>
</form>

<form action="{{ route('IndexView')}}" method="get">

  <label for="powers">Poderes</label>
  <select name="powers">
    <option>Todos</option> 
    @foreach($powers as $power) 
      <option>{{$power['name']}}</option> 
    @endforeach 
  </select>
 <button>Filtrar</button>
</form>

<form action="{{ route('IndexView')}}" method="get">

  <label for="organization">Organizaciones</label>
  <select name="organization">
    <option>Todas</option> 
    @foreach($organizations as $organization) 
      <option>{{$organization['name']}}</option> 
    @endforeach 
  </select>
  <button>Filtrar</button>
</form>

<form action="{{ route('IndexView')}}" method="get">

  <label for="heroe_name">Nombre de super héroe</label>
  <input type="text" name="heroe_name" placeholder="Busquemos por un nombre heróico...">    
  <button>Buscar</button>
</form>

<form action="{{ route('IndexView')}}" method="get">

  <label for="real_name">Nombre real</label>
  <input type="text" name="real_name" placeholder="Busquemos por un nombre real...">    
  <button>Buscar</button>
</form>


<table id="superTable">
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
    <td><button type="button" class="btn btn-warning" ><a href="{{route('imageUpload',$heroe['id'])}}" class="fas fa-portrait"></a></button></td>

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


</body>
</html>

@include('scripts.superTableScript')
