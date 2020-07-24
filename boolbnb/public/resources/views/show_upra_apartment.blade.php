@extends('layouts.mainLayout')

@section('content')

<!-- titolo e foto appartamento -->
  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <h1>{{$apartment['name']}}</h1>
    <h3>{{$apartment['address']}}</h3>
    <div class="foto">
      <img src="{{ asset($apartment['images']) }}"/>
    </div>
  </div>

<!-- descrizione appartamento  -->
  <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
    <div class="descr">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor7
       incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
       exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    </div>
  </div>

<!-- caratteristiche appartamento -->
  <div class="col-12 col-sm-12 offset-md-2 col-md-3 offset-lg-2 col-lg-3 offset-xl-2 col-xl-3 ">
    <div class="carat">
      <ul>
        <li>{{$apartment['rooms']}} stanze</li>
        <li>{{$apartment['beds']}} letti</li>
        <li>{{$apartment['bathrooms']}} bagni</li>
        <li>{{$apartment['mq']}} mq</li>
      </ul>
    </div>
  </div>

  {{-- MAPPA --}}
  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
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

  {{-- BOTTONI DI MODIFICA --}}
  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="modifica">
      <div>
        <a href="{{route('edit_apartment',$apartment['id'])}}">MODIFICA APPARTAMENTO</a>
      </div>
      <div>
        <a href="{{route('delete_apartment',$apartment['id'])}}">CANCELLA APPARTAMENTO</a>
      </div>

      <div>
          <a href="{{route('show_statistics',$apartment['id'])}}">STATISTICHE APPARTAMENTO</a>
      </div>

      <div>
        <form action="{{route('sponsorship_pay', $apartment['id'])}}" method="post">
              @csrf
              @method('POST')
              <label for="sponsorship_type">Sponsorizzazione</label>
              <select name="sponsorship_type" id="">
                  <option value="" selected> - </option>
                  <option value="1">2.99€ - 24H</option>
                  <option value="2">5.99€ - 72H</option>
                  <option value="3">9.99€ - 144H</option>
              </select>
              <input type="submit" value="Vai al pagamento">
          </form>
      </div>
    </div>
  </div>
@endsection
