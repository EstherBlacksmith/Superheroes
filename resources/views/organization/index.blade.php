@include('layouts.head')


@include('layouts.navigation')
<div class="container">
	<div class="row">
		<div class="col col-7">
			<h1 class="text-muted">Organizaciones</h1>

	      <table class="table table-striped table-light table-responsive-lg table-hover" id="superTable">
		         <thead class="thead-dark">
				<tr>
					<th onclick="sortTable(0)">Nombre</th>
					<th onclick="sortTable(1)">Descripción</th>
					<th>Héroes</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
				</thead>
				@foreach ($organizations as $organization)				
				<tr>
					<td > {{$organization->name}} </td>
					<td>{{$organization->description}} </td>		
					<td>
						<ul>							
							@foreach($organization->heroes as $heroe)	
							<li><strong>{{$heroe->heroe_name}}</strong></li>							
			   			@endforeach	 
						</ul>
					</td>			   
					<td><button type="button" class="btn btn-warning" ><a href="{{route('updateOrganization',$organization->id)}}" class="fas fa-edit"></a></button></td>
					<td><button type="button" class="btn btn-danger" ><a href="{{route('deleteOrganization',$organization->id)}}"  class="fas fa-trash-alt"></a></button></td>
				</tr>
				@endforeach

			</table>


			{{ $organizations->links() }}

			@if (\Session::has('errors'))
			<div class="alert alert-danger">
				<ul>
					<li>{!! \Session::get('errors') !!}</li>
				</ul>
			</div>
			@endif
		</body>
		@include('scripts.superTableScript')
	</div>
</div>
</div>


