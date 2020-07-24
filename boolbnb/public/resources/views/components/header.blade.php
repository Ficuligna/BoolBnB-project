

<div class="offset-1 col-5 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-3 offset-xl-1 col-xl-3">
  <div class="logo">
    <a href="{{route('welcome')}}"><img src="/img/logo.jpg"></a>


  </div>
  <div class="barre">
    <a href="#">
      <i class="fas fa-bars"></i>
    </a>
  </div>
</div>

<div class="offset-md-2 col-md-4 offset-lg-4 col-lg-4 offset-xl-4 col-xl-4">

  <div class="navigazione prova">
    <ul>
      <li><button class="reg" type="button" name="button"><strong>Registrati</strong></button></li>
      {{-- <li><a class="reg" href="{{ route('login') }}"><strong>Registrati</strong></a><li> --}}

      <li><button class="tasto" type="button" name="button"><strong>Accedi</strong></button></li>
    </ul>
  </div>
</div>

<div class="lista_ham">
  <div class="hamburger-menu off">
    <div class="chiusura">
      <a href="#" class="close">
        <i class="fas fa-times"></i>
      </a>
    </div>
    <div class="ham">
      <ul>
        @if (Route::has('login'))
          {{-- <div class="top-right links"> --}}
          @auth
            {{-- <a href="{{ url('/home') }}">Home</a> --}}
          @else
            <li><a class="reg" href="#"><strong>Registrati</strong></a><li>
              {{-- <li><a class="reg" href="{{ route('login') }}"><strong>Registrati</strong></a><li> --}}
              @if (Route::has('register'))
                {{-- <li><button class="tasto" type="button" name="button"><strong>Accedi</strong></button></li> --}}
                <a class="tasto" href="{{ route('register') }}">Accedi</a>
              @endif
            @endauth
            {{-- </div> --}}
          @endif

        </ul>
      </div>
    </div>
  </div>

  <div class="accedi off">

    <div class="container">
      <div class="row ">
        <div class="bordi">
          <div class="card">
            <h1>Accedi</h1>
            <div class="card-header">{{ __('Login') }}</div>

            <div class="card-body">
              <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                  <label for="email" class="col-md-1 col-form-label text-md-right">{{ __('') }}</label>

                  <div class="col-md-10">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="password" class="col-md-1 col-form-label text-md-right">{{ __('') }}</label>

                    <div class="col-md-10">
                      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                        @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-md-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                          <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-0">
                      <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                          {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                          <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                          </a>
                        @endif
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="registrati off">
        <!-- {{-- <div class="input">
        <h1>Registrati</h1>
        <input type="email" id="mail" name="email" class="form-control" placeholder="Inserisci la tua email">
      </div>
      <div class="input">
      <input type="password" id="password" class="form-control" placeholder="Inserisci la tua password">
    </div>
    <div class="input">
    <input type="text" id="nome" class="form-control" placeholder="Inserisci il tuo nome">
  </div>
  <div class="input">
  <input type="text" id="cognome" class="form-control" placeholder="Inserisci il tuo cognome">
</div>
<div class="input">
<input type="date" id="dataDiNascita" class="form-control" placeholder="Inserisci la tua data di nascita">
</div>
<div class="continua">
<button type="button" class="rimuovi" name="button">Continua</button>
</div> --}} -->

<div class="container">
  <div class="row justify-content-center">
    <div class="">
      <div class="card">
        <h1>Registrati</h1>
        <div class="card-header">{{ __('Register') }}</div>

        <div class="card-body bordo">
          <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group row">
              <label for="name" class="col-md-1 col-form-label text-md-right">{{ __('') }}</label>

              <div class="col-md-10">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nome" value="{{ old('name') }}"  autofocus>

                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="lastname" class="col-md-1 col-form-label text-md-right">{{ __('') }}</label>

                <div class="col-md-10">
                  <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" placeholder="Cognome"  value="{{ old('lastname') }}"  autofocus>

                    @error('lastname')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="dateOfBirth" class="col-md-1 col-form-label text-md-right">{{ __('') }}</label>

                  <div class="col-md-10">
                    <input id="dateOfBirth" type="data" class="form-control @error('dateOfBirth') is-invalid @enderror" name="dateOfBirth" placeholder="Data Di Nascita" value="{{ old('dateOfBirth') }}"  autofocus>

                      @error('dateOfBirth')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="email" class="col-md-1 col-form-label text-md-right">{{ __('') }}</label>

                    <div class="col-md-10">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email"  value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="password" class="col-md-1 col-form-label text-md-right">{{ __('') }}</label>

                      <div class="col-md-10">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                          @error('password')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="password-confirm" class="col-md-1 col-form-label text-md-right">{{ __('') }}</label>

                        <div class="col-md-10">
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Conferma Password"  required autocomplete="new-password">
                        </div>
                      </div>

                      <div class="form-group row mb-0">
                        <div class="col-md-4 offset-md-4">
                          <button type="submit" class="btn btn-primary btn_registra ">
                            {{ __('Conferma') }}
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <header>



          @auth


            <div class="loginlogout col-6 col-sm-6 col-md-6 col-lg-3 col-xl-6">

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
              <a class="accesso_effettuato sinistra" href="{{route('user_apartments')}}">I Miei Appartamenti</a><br>
              <a class="accesso_effettuato destra" href="{{route('show_messages')}}">I miei Messaggi</a><br>
              <button class="dropdown-item" style=color:"green" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </button>
          </div>
        @endauth

      </header>
