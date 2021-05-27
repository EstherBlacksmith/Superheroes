  <div class="bd-example bd-example-tabs">
    <div class="row">
     
      <div class="col col-12">

        <div class="nav" id="v-pills-tab" role="tablist">
           <li class="nav-item">
              <a class="nav-link  text-light" href="{{ route('home')}}">SuperHeroes</a>
          </li>
          @guest
          <li class="nav-item">
              <a class="nav-link  text-light" href="{{ route('login')}}">Inicia sesión</a>
          </li>
          <li class="nav-item">
              <a class="nav-link  text-light" href="{{ route('register')}}">Crea una cuenta</a>
          </li>
          @else

          <li>
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a class="nav-link  text-light"  href="#" onclick="event.preventDefault();this.closest('form').submit();">Cierra sesión</a>
            </form>
          </li>
              <a class="nav-link  text-light" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">Héroes</a>
          <a class="nav-link  text-light" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Poderes</a>
          <a class="nav-link  text-light" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Organizaciones</a>
          <a class="nav-link  text-light" id="v-pills-alignments-tab" data-toggle="pill" href="#v-pills-alignments" role="tab" aria-controls="v-pills-alignments" aria-selected="false">Alineamientos</a>         

          <li class="nav-item">
              <a class="nav-link  text-light" href="{{ route('combat')}}">Combate</a>
          </li>
          @endguest
        </div>     
      </div>

      <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
           <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link  text-light" href="{{ route('IndexView')}}">Listado</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  text-light" href="{{ route('HeroeCreateView')}}">Creación</a>
            </li>  
          </ul>

        </div>
        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link  text-light" href="{{ route('powerView')}}">Listado</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  text-light" href="{{ route('createPowerView')}}">Creación</a>
            </li>  
          </ul>
        </div>

        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
         <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link  text-light" href="{{ route('organizationView')}}">Listado</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  text-light" href="{{ route('createOrganizationView')}}">Creación</a>
          </li>   
        </ul>
      </div>

      <div class="tab-pane fade" id="v-pills-alignments" role="tabpanel" aria-labelledby="v-pills-alignments-tab">
         <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link  text-light" href="{{ route('alignmentView')}}">Listado</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  text-light" href="{{ route('createAlignmentView')}}">Creación</a>
          </li>
        

        </ul>
      </div>
      <div class="tab-pane fade active show" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

      </div>
    </div>
  </div>
</div>
</div>
<body style="background-image: url( {{asset('istockphoto-1139974714-612x612.jpg') }}); ">
