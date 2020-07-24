@extends('layouts.mainLayout')

@section('content')
  @include('components.header_generic')

  <div class="container content">
    <div class="row">
      <div class="space"></div>
      <div class="space"></div>
      <div class="space"></div>

      <div class="offset-3 col-6 titolo-principale">
        <h1 class="blu text-center">Modifica il tuo appartamento</h1>
      </div>
    </div>

        <form  action="{{route('update_apartment' , $apartment['id'])}}" method="post" enctype="multipart/form-data">
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

        <div class="row">
          <div class="dim offset-2 col-8">

            <div class="col-12 col-md-6 dimdue">
              <label for="name">Nome</label>
              <input type="text" name="name" value="{{$apartment['name']}}">
            </div>

            <div class="col-12 col-md-6 dimdue">
              <label for="address">Indirizzo</label>
              <input id="apt_address" type="text" name="address" value="{{$apartment['address']}}">
            </div>
            <input class="dispna" id="longitude" type="text" name="longitude" value="">
            <input class="dispna" id="latitude" type="text" name="latitude" value="">

            <div class="col-12 col-md-6 dimdue ridim">
              <label for="mq">Metri Quadri</label>
              <input  type="number" name="mq" value="{{$apartment['mq']}}">
            </div>

            <div class="col-12 col-md-6 dimdue ridim">
              <label for="rooms">Stanze</label>
              <input  type="number" name="rooms" value="{{$apartment['rooms']}}">
            </div>

            <div class="col-12 col-md-6 dimdue ridim">
              <label for="bathrooms">Bagni</label>
              <input  type="number" name="bathrooms" value="{{$apartment['bathrooms']}}">
            </div>

            <div class="col-12 col-md-6 dimdue ridim">
              <label for="beds">Posti Letto</label>
              <input type="number" name="beds" value="{{$apartment['beds']}}">
            </div>

            <div class="col-12 col-md-6 dimdue">
              <label for="description">Descrizione</label>
              <input type="text" name="description" value="{{$apartment['description']}}">
            </div>

            <div class="col-12 col-md-6 dimdue">
              <label for="images">Foto</label>
              <input class="ml-5" type="file" name="images" value=""><br>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="offset-2 col-8">
            <label class="color text-center" for="services[]">MODIFICA I SERVIZI DELLA TUA CASA</label>
          </div>
        </div>

        <div class="row">
          <div class="offset-2 col-8 text-center">
            @foreach ($services as $service)
              <div class="col-4 col-md-3 display">
                <div class="flexino">
                  <input class="checkbox" type="checkbox" name="services[]" value="{{$service['id']}}"
                  @foreach ($apartment-> services as $apt_service)
                    @if ($apt_service -> id === $service['id'])
                      checked
                    @endif
                  @endforeach
                  >
                  {{$service['name']}}
                </div>
              </div>

            @endforeach
          </div>
        </div>
        <div class="row">
          <div class="offset-2 col-8 selectsi text-center">
            <div>
              <label for="visibility">Appartamento visibile sul sito</label>
              <select class="" name="visibility">
                <option value="0" @if ($apartment["visibility"] == 0)
                  selected
                @endif>No</option>
                <option value="1" @if ($apartment["visibility"] == 1)
                  selected
                @endif>Si</option>
              </select>
            </div>
          </div>
        </div>

          <input id="update" class="dispna" type="submit" name="" value="">
        </form> <br>

      <div class="row">
        <div class="bt offset-2 col-8 text-center">
          <button id="update2" type="button" name="" value="">Modifica appartamento</button>
        </div>
      </div>
  </div>

  <div class="space"></div>
  <div class="space"></div>
  <div class="space"></div>

@endsection
