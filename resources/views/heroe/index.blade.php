 <!doctype html>
<html>
<head>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>
<body>
  <h1>This is example Bootstrap page</h1>

  <div class="bd-example bd-example-tabs">
    <div class="row">
      <div class="col-3">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">Héroes</a>
          <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Poderes</a>
          <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Organizaciones</a>
          <a class="nav-link" id="v-pills-alignments-tab" data-toggle="pill" href="#v-pills-alignments" role="tab" aria-controls="v-pills-alignments" aria-selected="false">Alineamientos</a>
        </div>
      </div>

      <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
           <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('IndexView')}}">Listado</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('HeroeCreateView')}}">Creación</a>
            </li>  
          </ul>

        </div>
        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('powerView')}}">Listado</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('createPowerView')}}">Creación</a>
            </li>  
          </ul>
        </div>

        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
         <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('organizationView')}}">Listado</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('createOrganizationView')}}">Creación</a>
          </li>   
        </ul>
      </div>

      <div class="tab-pane fade" id="v-pills-alignments" role="tabpanel" aria-labelledby="v-pills-alignments-tab">
         <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('alignmentView')}}">Listado</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('createAlignmentView')}}">Creación</a>
          </li>
        

        </ul>
      </div>
      <div class="tab-pane fade active show" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

      </div>
    </div>
  </div>
</div>

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


<table id="superHeroeTable">
<tr>
<!--When a header is clicked, run the sortTable function, with a parameter,
0 for sorting by names, 1 for sorting by country: -->
<th onclick="sortTable(0)">Apodo</th>
<th onclick="sortTable(1)">Nombre real</th>
<th onclick="sortTable(2)">Alineamiento</th>
<th>Poderes </th>
<th>Organizaciones</th>
<th>Editar</th>
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

	    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#poderesModal_{{$heroe['id']}}">
		  Poderes
		</button>
		</td>
		 
		<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#organizationsModal_{{$heroe['id']}}">
		  Organizaciones
		</button></td>
		<td><button type="button" class="btn btn-warning" ><a href="{{route('updateHeroe',$heroe['id'])}}" class="fas fa-edit"></a></button></td>
		<td><button type="button" class="btn btn-danger" ><a href="{{route('deleteHeroe',$heroe['id'])}}"  class="fas fa-trash-alt"></a></button></td>
  	</tr>

  @endforeach 

</table>

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


<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("superHeroeTable");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>
