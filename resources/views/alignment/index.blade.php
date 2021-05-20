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

@foreach ($alignments as $alignment)

	<tr>
	    <td> {{$alignment['name']}} </td>
	    <td>{{$alignment['description']}} </td>	       
		<td><button type="button" class="btn btn-warning" ><a href="{{route('updateAlignment',$alignment['id'])}}" class="fas fa-edit"></a></button></td>
		<td><button type="button" class="btn btn-danger" ><a href="{{route('deleteAlignment',$alignment['id'])}}"  class="fas fa-trash-alt"></a></button></td>
  	</tr>

  @endforeach 

</table>
</body>