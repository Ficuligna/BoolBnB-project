@extends('layouts.mainLayout')

@section('content')
  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <h1>I miei appartamenti</h1>
  <div class="col-md-6 col-lg-6 col-xl-6">
    <div class="crea_appartamento">
      <h1><a href="{{route('create_apartment')}}">Crea nuovo appartamento   <br><i class="fas fa-plus"></i><i class="fas fa-home"></i>
      </a>
      </h1>
    </div>
  </div>


  <div class="risultati_appartamenti_proprietario">
    @foreach ($apartments as $apartment)
      <div class="col-md-6 col-lg-6 col-xl-6">
        <div class="appartamenti_proprietario">
          <div class="appartamenti_proprietario_foto">
            <a href="{{route('show_upra_apartment',$apartment['id'])}}">
              <img class="prova2" src="{{ asset($apartment['images'])}}">
            </a>
          </div>
          <div class="appartamenti_proprietario_nome">
            <h2>
              <a href="{{route('show_upra_apartment',$apartment['id'])}}">
                {{$apartment["name"]}}
              </a>
            </h2>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>


@endsection
