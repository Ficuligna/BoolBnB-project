
{{-- Navbar --}}

<nav class="navbar navbar-expand-lg navbar-light bg-light px-4 fixed-top">


  <a class="navbar-brand" href="{{route('welcome')}}">
    <img src="/img/logoNav.png" alt="">
  </a>



  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>



  {{-- Menu di navigazione --}}
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    @auth
      {{-- deve sparire navigazione prova --}}
    @else
    <ul class="navbar-nav mr-auto">

      {{-- Link home --}}
      <li class="nav-item active">
        <a class="nav-link" href="{{route('welcome')}}">Home <span class="sr-only">(current)</span></a>
      </li>

      {{-- Link Registrati più modal --}}
      <li class="nav-item">
        {{-- <div class="container"> --}}
        <!-- Link to Open the Modal -->
        <a class="nav-link reg" data-toggle="modal" data-target="#myModal" href="#">Registrati</a>
        <!-- The Modal -->
        <div class="modal fade" id="myModalRegistrati">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="registrati off">

              <div class="container">
                <div class="row justify-content-center">
                  <div class="">
                    <div class="card">
                      <h1 class="mt-5">Registrati</h1>
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

            </div>
          </div>
        </div>
        {{-- </div> --}}
      </li>

      {{-- Link Accedi più modal --}}
      <li class="nav-item dropdown">
        {{-- Modal --}}
        {{-- <div class="container"> --}}
          <a class="nav-link tasto" href="#" id="navbarDropdown" role="button" data-toggle="modal" data-target="#myModal" aria-haspopup="true" aria-expanded="false">
            Accedi
          </a>
          <!-- The Modal -->
          <div class="modal fade" id="myModalAccedi">
            <div class="modal-dialog">
              <div class="modal-content">
                <!-- Modal Header -->
                <div class="accedi off">

                  <div class="container">
                    <div class="row ">
                      <div class="bordi">
                        <div class="card">
                          <h1 class="mt-5">Accedi</h1>
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
                                    <div class="col-12">
                                      <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                      </button>
                                    </div>
                                    <div class="col-12">
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
              </div>
            </div>
          </div>
        {{-- </div> --}}
      </li>
    </ul>
    @endauth


    @auth
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>

      <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('welcome')}}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="accesso_effettuato nav-link" href="{{route('user_apartments')}}">I Miei Appartamenti</a>
          </li>
          <li>
            <a class="accesso_effettuato nav-link" href="{{route('show_messages')}}">I miei Messaggi</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link " href="{{ route('logout') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
            </a>
          </li>
      </ul>
    @endauth

    {{-- Dove vuoi andare  --}}
    <form autocomplete="off" class="form-inline my-2 my-lg-0" action="{{route('ui_apartments')}}" method="post">
          @csrf
             @method("POST")
             @if ($errors->any())
               <div class="alert alert-danger">
                 <ul>
                   @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                   @endforeach
                 </ul>
               </div>
             @endif

          <div class='search_container'>
            <input id="apt_address" type="text" name="address" value="" placeholder="Dove vuoi andare?" class="form-control mr-sm-2 dove" type="search" placeholder="Search" aria-label="Search">
            <div class="autocomplete">
              <div>
              </div>
            </div>
          </div>

          <input class="dispna" id="longitude" type="text" name="longitude" value="">
          <input class="dispna" id="latitude" type="text" name="latitude" value="">
          <input id="search_radius" class="dispna" type="number" name="search_radius" value="20">
          <input id="search_welcome" class="dispna" type="submit" name="">
        </form>
      <button class="cerca btn btn-outline-success my-2 my-sm-0" id="search_welcome2" type="button" name="" value="">Cerca</button>
  </div>
</nav>
