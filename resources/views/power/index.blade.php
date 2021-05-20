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
    <table>
<tr>
	<th>Nombre</th>
	<th>Descripción</th>

	<th>Editar</th>
	<th>Eliminar</th>
</tr>

@foreach ($powers as $power)

	<tr>
	    <td> {{$power['name']}} </td>
	    <td>{{$power['description']}} </td>	       
		<td><button type="button" class="btn btn-warning" ><a href="{{route('updatePower',$power['id'])}}" class="fas fa-edit"></a></button></td>
		<td><button type="button" class="btn btn-danger" ><a href="{{route('deletePower',$power['id'])}}"  class="fas fa-trash-alt"></a></button></td>
  	</tr>

  @endforeach 

</table>
</body>