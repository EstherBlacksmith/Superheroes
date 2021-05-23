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
 	<h1>Selecciona los dos héroes que vana  luchar</h1>
 	<form method="get" action="{{route('combatCard')}}">
 		@csrf
 	<div class="form-group">
	    <label for="id_1">Luchador 1</label>
	    <select  class="form-control" id="id_1" name="id_1">
	        @foreach ($fighter as $f1)
			<option value="{{$f1->id}}">
				{{$f1->heroe_name}}
			</option>
			@endforeach
	    </select>
  	</div>


  	<div class="form-group">
	    <label for="id_2">Luchador 2</label>
	    <select  class="form-control" id="id_2" name="id_2">
	        @foreach ($fighter as $f2)
			<option value="{{$f2->id}}">
				{{$f2->heroe_name}}
			</option>
			@endforeach
	    </select>
  	</div>
  <button type="submit">Figth!!</button>
  </form>
 		

 		

 </table>
</body>
