@include('layouts.head')

@include('layouts.navigation')
<div class="container">
	<div class="row">
		<div class="col col-12">
			<h1 class="text-muted">Selecciona los dos héroes que van a  luchar</h1>
		</div>
		<div class="col col-5">

			<form method="post" action="{{route('combatCard')}}">
				@csrf
				<div class="form-group">
					<label for="id_1" class="text-white">Luchador 1</label>
					<select  class="form-control" id="id_1" name="id_1">
						@foreach ($fighter as $f1)
						<option value="{{$f1->id}}">
							{{$f1->heroe_name}}
						</option>
						@endforeach
					</select>
				</div>


				<div class="form-group">
					<label for="id_2" class="text-white" >Luchador 2</label>
					<select  class="form-control" id="id_2" name="id_2">
						@foreach ($fighter as $f2)
						<option value="{{$f2->id}}">
							{{$f2->heroe_name}}
						</option>
						@endforeach
					</select>
				</div>
				<button class="btn btn-light" type="submit">Figth!!</button>
			</form>
			
		</div>
	</div>
</div>

