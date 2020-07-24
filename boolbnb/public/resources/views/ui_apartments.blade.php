@extends('layouts.mainLayout')
@section('content')

{{-- FILTRI DI RICERCA --}}
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
  <form  action="{{route('ui_filtered_apt')}}" method="post">
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

    <div class="filtri d-flex justify-content-around flex-wrap">
      {{-- <button class="tipo" type="button" name="button">Tipo di alloggio</button> --}}

      <div class="stanze" id="ciaociao">
        <button type="button" name="button">Stanze e letti</button>
      </div>

      <div class="serv" id="ciao">
        <button  type="button" name="button">Servizi</button>
      </div>

      <input id="apt_address" type="location" name="address" value="{{$add}}" class="form-control" placeholder="Dove vuoi andare?">

      <div class="distanza">
        <span>Distanza</span>
        <input class="dist" id="search_radius" type="number" name="search_radius" value="20">
        <span>Km</span>
      </div>

      <div class="filtro_cerca">
        <button id="filtered2" type="button" name="" value=""><strong>Cerca</strong></button>
      </div>

      {{-- MENU A TENDINA STANZE E LETTI --}}
      <div class="stanze_letti off">
        <div class="bedrooms">
          <label for="rooms">Stanze</label>
          <input type="text" name="rooms" value="">
        </div>
        <div class="bedrooms">
          <label for="beds">Letti</label>
          <input type="text" name="beds" value="">
        </div>
      </div>
    </div>

    {{-- MENU A TENDINA SERVIZI --}}
  <div class="servizi off">
    @foreach ($services as $service)
      <div>
        <input class="checkbox" type="checkbox" name="services[]" value="{{$service['id']}}">
        {{$service['name']}}
      </div>
    @endforeach
  </div>

    {{-- MENU A TENDINA TIPO DI ALLOGGIO --}}
    {{-- <div class="tipo_di_alloggio off">
    @foreach ($categories as $category)
    <div>
    <input class="checkbox" type="checkbox" name="category[]" value="{{$category['id']}}">
    {{$category['name']}}
    </div>
  @endforeach
  </div> --}}


    <input class="dispna" id="longitude" type="text" name="longitude" value="">
    <input class="dispna" id="latitude" type="text" name="latitude" value="">
    <input id="filtered" class="dispna" type="submit" name="">
  </form>
</div>


<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
  <div class="results">
    <h1>Risultati ricerca</h1>
    <div class="apartments_reserch">
      <div class="row">
        @foreach ($apartments_found as $apartment)
          <div class="apartment_reserch">
            <div class="foto_reserch">
              <a href="{{route('create_view',$apartment['id'])}}"><img src="{{ asset($apartment['images'])}}"></a>
            </div>
            <div class="caratteristiche_reserch">
              <h2>
                <a href="{{route('create_view',$apartment['id'])}}"> {{ $apartment['name']}}</a>
              </h2>
              {{-- <h3>{{$apartment['category_id']}}</h3> --}}
              <h3>
                {{$apartment['rooms']}} stanze - {{$apartment['beds']}} letti - {{$apartment['bathrooms']}} bagni
              </h3>
              <h3>
                @foreach ($apartment -> services as $service)
                  <span>{{$service['name']}}</span>
                @endforeach
              </h3>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection
