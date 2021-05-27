@include('layouts.head')

@include('layouts.navigation')

<div class="container">
	<div class="row">
		<div class="col col-7">
			<h1 class="text-muted">Poderes</h1>
					
		      <table class="table table-striped table-light table-responsive-lg table-hover" id="superTable">
		         <thead class="thead-dark">
				<tr>
					<th onclick="sortTable(0)">Nombre</th>
					<th onclick="sortTable(1)">Descripción</th>
					<th onclick="sortTable(2)">Puntos de daño</th>
					<th>Héroes</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
				</thead>
				@foreach ($powers as $power)
				@foreach($power->heroes as $heroe)	
							<p style="background-color: white;">-------------></p>{{$heroe}}						
			   			@endforeach	 
				<tr>
					<td>{{$power->name}} </td>
					<td>{{$power->description}} </td>	      
					<td>{{$power->damage_points}} </td>	
					<td>
						<ul>							
						@foreach($power->heroes as $heroe)	
							<li><strong>{{$heroe->heroe_name}}</strong></li>							
			   			@endforeach	 
						</ul>
					</td>	 
					<td><button type="button" class="btn btn-warning" ><a href="{{route('updatePower',$power->id)}}" class="fas fa-edit"></a></button></td>
					<td><button type="button" class="btn btn-danger" ><a href="{{route('deletePower',$power->id)}}"  class="fas fa-trash-alt"></a></button></td>
					
				</tr>

				@endforeach 

			</table>
						
			{{ $powers->links() }

			@if (\Session::has('errors'))
			<div class="alert alert-danger">
				<ul>
					<li>{!! \Session::get('errors') !!}</li>
				</ul>
			</div>
			@endif

			@include('scripts.superTableScript')
		</div>
	</div>
</div>
