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

    <h1>Poderes</h1>
    <table id="superTable">
<tr>
	<th onclick="sortTable(0)">Nombre</th>
	<th onclick="sortTable(1)">Descripción</th>
	<th onclick="sortTable(2)">Puntos de daño</th>

	<th>Editar</th>
	<th>Eliminar</th>
</tr>

@foreach ($powers as $power)

	<tr>
	    <td> {{$power['name']}} </td>
	    <td>{{$power['description']}} </td>	      
	    <td>{{$power['damage_points']}} </td>	 
		<td><button type="button" class="btn btn-warning" ><a href="{{route('updatePower',$power['id'])}}" class="fas fa-edit"></a></button></td>
		<td><button type="button" class="btn btn-danger" ><a href="{{route('deletePower',$power['id'])}}"  class="fas fa-trash-alt"></a></button></td>
  	</tr>

  @endforeach 

</table>

</body>
@include('scripts.superTableScript')