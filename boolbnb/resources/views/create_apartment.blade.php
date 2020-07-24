@extends('layouts.mainLayout')

@section('content')
  @include('components.header_generic')

  <div class="container">
    <div class="row">
      <div class="space"></div>
      <div class="space"></div>
      <div class="space"></div>

      <div class="offset-3 col-6 titolo-principale">
        <h1 class="blu text-center">Inserisci il tuo appartamento</h1>
      </div>
    </div>

    <form  action="{{route('store_apartment')}}" method="post" enctype="multipart/form-data">
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
          <input type="text" name="name" value="">
        </div>

        <div class="col-12 col-md-6 dimdue">
          <label for="address">Indirizzo</label>
          <input id="apt_address" type="text" name="address" value="">
        </div>

        <div class="col-12 col-md-6 dimdue ridim">
          <label for="mq">Metri Quadri</label>
          <input  type="number" name="mq" value="">
        </div>

        <div class="col-12 col-md-6 dimdue ridim">
          <label for="rooms">Stanze</label>
          <input  type="number" name="rooms" value="">
        </div>

        <div class="col-12 col-md-6 dimdue ridim">
          <label for="bathrooms">Bagni</label>
          <input  type="number" name="bathrooms" value="">
        </div>

        <div class="col-12 col-md-6 dimdue ridim">
          <label for="beds">Posti Letto</label>
          <input type="number" name="beds" value="">
        </div>

        <input class="dispna" id="longitude" type="text" name="longitude" value="">
        <input class="dispna" id="latitude" type="text" name="latitude" value="">

        <div class="col-12 col-md-6 dimdue">
          <label for="descr">Descrizione</label>
          <input type="textarea" name="description" value="">
        </div>

        <div class="col-12 col-md-6 dimdue">
          <label for="images">Foto</label>
          <input class="ml-5" type="file" name="images" value=""><br>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="offset-2 col-8">
          <label class="color text-center" for="services[]">AGGIUNGI I SERVIZI DELLA TUA CASA</label>
      </div>
    </div>

    <div class="row">
      <div class="col-12 text-center">
        @foreach ($services as $service)

        <div class="col-4 col-md-3 display">
          <div class="flexino">
            <input class="checkbox" type="checkbox" name="services[]" value="{{$service['id']}}">
            {{$service['name']}}
          </div>
        </div>
        @endforeach
      </div>
    </div>

    <div class="row">
      <div class="offset-2 col-8 selectsi text-center">
        <label for="visibility">Appartamento visibile sul sito</label>
        <select class="" name="visibility">
          <option value="0">No</option>
          <option value="1" selected>Si</option>
        </select>
      </div>
    </div>

    <input id="create" class="dispna" type="submit" name="" value="Create">

  </form> <br>

  <div class="row">
    <div class="bt offset-2 col-8 text-center">
      <button id="create2" type="button" name="" value="">Crea appartamento</button>
    </div>
  </div>

</div>

{{-- </div>
</div>
</div> --}}
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>

@endsection
