@extends('layouts.mainLayout')

@section('content')

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

    <div class="dim">

      <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 dimdue">
        <label for="name">Nome</label>
        <input type="text" name="name" value="{{$apartment['name']}}">
      </div>

      <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 dimdue ridim">
        <label for="mq">Metri Quadri</label>
        <input  type="number" name="mq" value="{{$apartment['mq']}}">
      </div>

      <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 dimdue ridim">
        <label for="rooms">Stanze</label>
        <input  type="number" name="rooms" value="{{$apartment['rooms']}}">
      </div>

      <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 dimdue">
        <label for="address">Indirizzo</label>
        <input id="apt_address" type="text" name="address" value="{{$apartment['address']}}">
      </div>

      <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 dimdue ridim">
        <label for="bathrooms">Bagni</label>
        <input  type="number" name="bathrooms" value="{{$apartment['bathrooms']}}">
      </div>

      <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 dimdue ridim">
        <label for="beds">Posti Letto</label>
        <input type="number" name="beds" value="{{$apartment['beds']}}">
      </div>
      <!-- <div class="ciaociao"> -->



      <input class="dispna" id="longitude" type="text" name="longitude" value="">
      <input class="dispna" id="latitude" type="text" name="latitude" value="">


      <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 dimdue">
        <label for="descr">Descrizione</label>
        <input type="text" name="descr" value="">
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 dimdue">


        <label for="images">Foto</label>
        <input  type="file" name="images" value="{{$apartment['images']}}"><br>
      </div>
    </div>
    <!-- <div class="space"> -->

    <label class="color" for="services[] ">SERVICES</label>
    @foreach ($services as $service)

      <div class="col-4 col-sm-4 col-md-3 col-lg-3 col-xl-3 display">
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

      <!-- </div> -->
    @endforeach
    <div class="selectsi">


      <label for="category_id">Category</label>
      <select class="" name="category_id">
        @foreach ($categories as $category)
          <option value="{{$category['id']}}"
          @if ($apartment["category_id"] == $category["id"] )
            selected
          @endif

          >{{$category['name']}}</option>

        @endforeach
      </div>
    </select>
    <div class=" col-12  col-sm-12  col-md-12  col-lg-12  col-xl-12 selectsi">


      <label for="visibility">visibility</label>
      <select class="" name="visibility">
        <option value="0" @if ($apartment["visibility"] == 0)
          selected
        @endif>No</option>
        <option value="1" @if ($apartment["visibility"] == 1)
          selected
        @endif>Si</option>

      </select>
    </div>

    <input id="update" class="dispna" type="submit" name="" value="">

  </form> <br>


  <div class="bt">
    <button id="update2" type="button" name="" value="">Update</button>

  </div>

@endsection
