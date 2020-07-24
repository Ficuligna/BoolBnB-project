@extends('layouts.mainLayout')

@section('content')
  @include('components.header_generic')

  <div class="container">
    <div class="row">
      <!-- titolo e foto appartamento -->
        <div class="offset-1 col-10">
          <div class="space"></div>
          <div class="space"></div>
          <h1 class="blu text-center">{{$apartment['name']}}</h1>
          <div class="space"></div>
          <h3 class="blu text-center">{{$apartment['address']}}</h3>
          <div class="space"></div>
          <div class="foto">
            <img class="w-100" src="{{ asset($apartment['images']) }}"/>
          </div>
        </div>
    </div>
    <div class="row">
      <!-- caratteristiche appartamento -->
        <div class="col-12 text-center">
            <div class="space"></div>
            <span class="blu text-center paragrafo_appartamento">{{$apartment['rooms']}} stanze - {{$apartment['beds']}} letti - {{$apartment['bathrooms']}} bagni - {{$apartment['mq']}} mq</span></li><br>
            <div class="space"></div>
            <span class="blu text-center paragrafo_appartamento">Servizi</span>
            <ul class="serviceul">
              @foreach ($apartment -> services as $service)
                  <li>{{$service -> name}}</li>
              @endforeach

            </ul>
            <div class="space"></div>

        </div>

      <!-- descrizione appartamento  -->
        <div class="col-12">
          <div class="descr paragrafo_appartamento blu">
            {{$apartment["description"]}}
          </div>
        </div>
    </div>
    {{-- MAPPA --}}
    <div class="row">

      <div class="col-12">
        <div class="map_proprietario">
          <div id="latitude" class="dispna">
            {{$apartment["latitude"]}}
          </div>
          <div id="longitude" class="dispna">
            {{$apartment["longitude"]}}
          </div>
          <div class="big" id='map'></div>
        </div>
      </div>
    </div>

    <div class="row">
      {{-- BOTTONI DI MODIFICA --}}
      <div class="col-12">
        <div class="modifica ">
          <div class="col-4">
            <a class="blu" href="{{route('edit_apartment',$apartment['id'])}}">MODIFICA APPARTAMENTO</a>
          </div>
          <div class="col-4">
            <a class="blu" href="{{route('delete_apartment',$apartment['id'])}}">CANCELLA APPARTAMENTO</a>
          </div>
          <div class="col-4">
              <a class="blu" href="{{route('show_statistics',$apartment['id'])}}">STATISTICHE APPARTAMENTO</a>
          </div>

        </div>
        <div class="space"></div>
        <div class="space">

        </div>
        <div class="row">
          <div class="offset-3 col-6 text-center">
            <form  action="{{route('sponsorship_pay', $apartment['id'])}}" method="post">
                  @csrf
                  @method('POST')
                  <label class="blu paragrafo_appartamento" for="sponsorship_type">SPONSORIZZAZIONE</label><br>
                  <select class="blu" name="sponsorship_type" id="">
                      <option class="blu" value="" selected> 0€ </option>
                      <option class="blu" value="1">2.99€ - 24H</option>
                      <option value="2">5.99€ - 72H</option>
                      <option value="3">9.99€ - 144H</option>
                  </select>
                  <input type="submit" value="Vai al pagamento">
              </form>
          </div>

        </div>
      </div>

    </div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>

  </div>

@endsection
