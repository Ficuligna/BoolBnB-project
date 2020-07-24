@extends('layouts.mainLayout')

@section('content')
  @include('components.header_generic')

  <div class="container-fluid content">
    <div class="row mx-1 mx-lg-5">
      <div class="col-12">
        <div class="space"></div>
        <div class="space"></div>
        <h1 class="blu">I miei appartamenti</h1>
        <div class="space"></div>
      </div>
    </div>

    <div class="row mx-1 mx-lg-5 d-flex flex-wrap">
      <div class="col-12 col-md-6 col-lg-4">
        <div class="crea_appartamento d-flex">
          <h1 class="m-auto">
            <a class="blu" href="{{route('create_apartment')}}">Crea nuovo appartamento   <br><i class="fas fa-plus"></i><i class="fas fa-home"></i>
            </a>
          </h1>
        </div>
        <div class="space"></div>
      </div>

      @foreach ($apartments as $apartment)
        <div class="col-12 col-md-6 col-lg-4">
          <a href="{{route('show_upra_apartment',$apartment['id'])}}">
            <img class="img-apartment w-100" src="{{ asset($apartment['images'])}}">
          </a>
          <div class="space"></div>
          <h2 >
            <a class="blu" href="{{route('show_upra_apartment',$apartment['id'])}}">
              {{$apartment["name"]}}
            </a>
          </h2>
        <div class="space"></div>
        <div class="space"></div>
      </div>
      @endforeach
    </div>
</div>
@endsection
