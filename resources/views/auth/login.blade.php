@include('layouts.head')
<body>
@include('layouts.navigation')
 <div class="container">
    <div class="row">
  
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group text-white">
                    <label for="email" value="{{ __('Email') }}" >Email</label>
                    <input id="email"  class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                </div>
                <div class="form-group text-white">
                    <label for="password" value="{{ __('Password') }}" >Contraseña</label>
                    <input id="password"  class="form-control" type="password" name="password" required autocomplete="current-password" />
                </div>

               

                <div class="flex items-center justify-end mt-4">       

                <button class="btn btn-light" type="submit">{{ __('Inicia sesión') }} </button> 
                </div>
            </form>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
</div>
</body>
