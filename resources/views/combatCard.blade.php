@include('layouts.head')

@include('layouts.navigation')
<div class="container">
	<div class="jumbotron ">
		<div class="container">
			<div class="row">
				<div class="col col-5">
					<h3 class="display-6">Este combate tiene la inciativa... </h3> 
					<h2 class="display-5" style="color:#563d7c;" > 
						<strong>
						 @if ($randomInitiative == 1)
						  {{$fighter_1->heroe_name}}
						 @else
						  {{$fighter_2->heroe_name}}
						 @endif 
					 </strong>				

					</h2>
				</div>
				<div class="col col-5">
					<p class="lead"><h2  class="">Aprieta el botón de lucha cuando quieras empezar!</h2></p>
				</div>
				<div class=" col col-2">
					<button class="btn btn-rounded rounded-circle border-0" onclick=" disableEnableCard( {{$winnerCard}} );"> <img class="rounded-circle" 
						src="{{asset('heroe_icons/swordwomanROund.svg')}}"
						alt="swordwoman"
						height="87"
						width="100" /></button>
					</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="card-deck">
					<div class="card" style="width: 18rem;" id="fighter_1">
						@if(isset($fighter_1->image_name))
						<img class="rounded img-fluid img-thumbnail" class="card-img-top" id="heroe_image" style="width: 50%:" src="{{ asset('images/'.$fighter_1->image_name)}}">
						@else

						<img class="rounded img-fluid img-thumbnail" class="card-img-top" id="heroe_image" style="width: 50%:" src="{{asset('heroe_icons/desconocido.svg')}}"
						alt="swordwoman"
						height="300"
						width="400" />
						@endif
						<div class="card-body">

							{{$alignments_1}}

							<h5 id="heroe_name" class="card-title">{{$fighter_1->heroe_name}}</h5>
							<h5>Organizaciones</h5>
							<ul>
								@foreach($organizations_1 as $org_1)
								<li id="heroe_organization">{{$org_1->name}}</li>
								@endforeach
							</ul> 				
							<h5>Poderes</h5>
							<dl>
								@foreach($powers_1 as $powa_1)
								<dt  class="list-group-item" id="powa">{{$powa_1->name}}</dt>
								<dd> Descripción: {{$powa_1->description}}</dd>
								<dd>Puntos de daño: {{$powa_1->damage_points}}</dd>
								@endforeach 
							</dl>					
						</div>
					</div>
				
					<div class="card" id="winnerCard" style="visibility: hidden;">
						<div class="card-body">
							{!! $stringCombat !!}
							<br>
							<br>
							<h5 class="card-title">La vitoria es para....</h5>
							<h5 class="card-text">{{$winner->heroe_name}}</h5>
							<a href="{{route('combat')}}">Volver a combatir</a>
						</div>
					</div>

					<div class="card" style="width: 18rem;" id="fighter_2">
						@if(isset($fighter_2->image_name))
						<img class="rounded img-fluid img-thumbnail" class="card-img-top" id="heroe_image" style="width: 50%:" src="{{ asset('images/'.$fighter_2->image_name)}}" >
						@else

						<img class="rounded img-fluid img-thumbnail" class="card-img-top" id="heroe_image" style="width: 50%:"src="{{asset('heroe_icons/desconocido.svg')}}"
						alt="swordwoman"
						height="300"
						width="400" />
						@endif
						<div class="card-body">

							{{$alignments_2}}

							<h5 id="heroe_name" class="card-title">{{$fighter_2->heroe_name}}</h5>
							<h5>Organizaciones</h5>
							<ul>
								@foreach($organizations_2 as $org_2)
								<li id="heroe_organization">{{$org_2->name}}</li>
								@endforeach
							</ul> 	

							<h5>Poderes</h5>

							<dl>
								@foreach($powers_2 as $powa_2)
								<dt  class="list-group-item" id="powa">{{$powa_2->name}}</dt>
								<dd>Descripción: {{$powa_2->description}}</dd>
								<dd>Puntos de daño: {{$powa_2->damage_points}}</dd>
								@endforeach 
							</dl>						
						</div> 				
					</div>
				</div>
			</div>

		</div>

<script>

	function disableEnableCard(winnerCard) {

		if (winnerCard == 1){		
			document.getElementById("fighter_2").style.backgroundColor = 'red';
			document.getElementById("fighter_1").style.backgroundColor = 'green';
	
		}else{	
			document.getElementById("fighter_2").style.backgroundColor = 'green';
			document.getElementById("fighter_1").style.backgroundColor = 'red';		
		}

		document.getElementById("winnerCard").style="visibility: visible;" ;


	}



</script>