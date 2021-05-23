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
 	<div class="row">
 		<div class="col col-4">
 			<h3>Este combate tiene la inciativa... </h3> 
 			@if ($randomInitiative = 1)
 			{{$fighter_1->heroe_name}}
 			@else
 			{{$fighter_2->heroe_name}}
 			@endif

 			<div class="card" style="width: 18rem;" id="fighter_1">
 				@if(isset($fighter_1->image_name))
 				<img class="rounded img-fluid img-thumbnail" class="card-img-top" id="heroe_image" style="width: 50%:" src="{{ asset('images/'.$fighter_1->image_name)}}">
 				@endif
 				<div class="card-body">
 			
 					{{$alignments_1}}
 					
 					<h5 id="heroe_name" class="card-title">{{$fighter_1->heroe_name}}</h5>
 					@foreach($organizations_1 as $org_1)
 						<h3 id="heroe_organization">{{$org_1->name}}</h3>
 					@endforeach
 				</div>
 				<ul class="list-group list-group-flush">
 					@foreach($powers_1 as $powa_1)
 						<li class="list-group-item" id="powa">{{$powa_1->name}}</li>
 					@endforeach 					
 				</ul>
 				<div class="card-body">
 					<a href="#" class="card-link">Card link</a>
 					<a href="#" class="card-link">Another link</a>
 				</div>
 			</div>
 			
 		</div>
 		<div class="col col-3">
 					<h1>Aprieta el botón de lucha cuando quieras empezar!</h1>
			<button class="btn btn-rounded rounded-circle border-0" onclick="disableEnableCard( {{$randomInitiative}} );"> <img class="rounded-circle" 
    src="{{asset('heroe_icons/swordwomanROund.svg')}}"
    alt="swordwoman"
    height="87"
    width="100" /></button>
 		</div>
 		<div class="col col-4">
 			<div class="card" style="width: 18rem;" id="fighter_2">
 				@if(isset($fighter_2->image_name))
 				<img class="rounded img-fluid img-thumbnail" class="card-img-top" id="heroe_image" style="width: 50%:" src="{{ asset('images/'.$fighter_2->image_name)}}">
 				@endif
 				<div class="card-body">
 			
 					{{$alignments_2}}
 					
 					<h5 id="heroe_name" class="card-title">{{$fighter_2->heroe_name}}</h5>
 					@foreach($organizations_2 as $org_2)
 						<h3 id="heroe_organization">{{$org_2->name}}</h3>
 					@endforeach
 				</div>
 				<ul class="list-group list-group-flush">
 					@foreach($powers_2 as $powa_2)
 						<li class="list-group-item" id="powa">{{$powa_2->name}}</li>
 					@endforeach 					
 				</ul>
 				<div class="card-body">
 					<a href="#" class="card-link">Card link</a>
 					<a href="#" class="card-link">Another link</a>
 				</div>
 			</div>
 			
 		</div>
 		

 	</div>
 	

 			
 		</body>


<script>

function disableEnableCard($Card) {
	alert($Card);
	
	$myCard_1 = 'fighter_1';
	$myCard_2 = 'fighter_2';

	if ($card = 1){
		document.getElementById("$myCard_2").disabled = true;
		document.getElementById("myCard_1").disabled = false;
	}else{
		document.getElementById("$myCard_1").disabled = true;
		document.getElementById("myCard_2").disabled = false;

	}
}
</script>