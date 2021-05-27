@include('layouts.head')

@include('layouts.navigation')
<div class="container">
  <div class="row">
    <div class="col col-5">

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group text-white">

                <label for="name" value="{{ __('Name') }}" >Nombre</label>
                <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

                   <div class="form-group text-white">

                <label for="email" value="{{ __('Email') }}" > Email</label>
                <input id="email"  class="form-control" type="email" name="email" :value="old('email')" required />
            </div>
            <div class="form-group text-white">

                <label for="password" value="{{ __('Password') }}"  > Contraseña</label>
                <input id="password"  class="form-control" type="password" name="password" required autocomplete="new-password" />
            </div>

                  <div class="form-group text-white">

                <label for="password_confirmation" value="{{ __('Confirm Password') }}" > Confirmar contraseña</label>
                <input id="password_confirmation"  class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                      <div class="form-group text-white">

                    <label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </label>
                </div>
            @endif

            <div class="flex items-center justify-end  ">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 text-white" href="{{ route('login') }}">
                    {{ __('¿Ya tienes una cuenta?') }}
                </a>
            <button type="submit" class="btn btn-light">
                    {{ __('Regístrate') }}
                </button>
            </div>
        </form>


    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

 </div>
</div>
</div>
</body>
