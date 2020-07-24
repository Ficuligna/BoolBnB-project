@extends('layouts.mainLayout')

@section('content')

@include('components.header_welcome')


    {{-- Carousel --}}
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        {{-- Prima slide --}}
        <div class="carousel-item active">
          <img class="d-block w-100" src="/img/firenze.jpg" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <h1 class="titolo-slide">Città d'arte</h1>
            <span>Prenota la tua stanza nelle più belle capitali del mondo</span>
          </div>
        </div>
        {{-- Seconda slide --}}
        <div class="carousel-item">
          <img class="d-block w-100" src="/img/mare.jpg" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
            <h1 class="titolo-slide">Vacanza al mare</h1>
            <span>Prenota il tuo appartamento in una località da sogno</span>
          </div>
        </div>
        {{-- Terza slide --}}
        <div class="carousel-item">
          <img class="d-block w-100" src="/img/borghi.webp" alt="Third slide">
          <div class="carousel-caption d-none d-md-block">
            <h1 class="titolo-slide">Piccoli borghi</h1>
            <span>Prenota la tua esperienza esclusiva nelle piccole località autentiche</span>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="space"></div>

    {{-- In evidenza --}}
    <div class="container-fluid">
      <div class="row mx-2">
        <div class="col-12">
          <div class="space"></div>
          <h1 class="titolo-principale blu">Trova ispirazione per i tuoi prossimi viaggi</h1>
          <div class="space"></div>
        </div>
      </div>
      <div class="row mx-2" id="welcome_sponsored_apt">
      </div>
    </div>

  {{-- HANDELBARS --}}

  <script id="giacomino-template" type="text/x-handlebars-template">
    <div class="apartmenti-welcome mb-4 col-12 col-md-6 col-lg-4 @{{add_class}}">
        <div class="img_welcome h-60">
            <img class="w-100 h-100 rounded-top" src="@{{image_route}}" alt="">
        </div>
        <div class="p-3 h-40 dettagli-welcome rounded-bottom justify-content-between">
            <div class="conteiner_info">
                <h3><a class=" blu" href="/new_view/@{{id}}">@{{title}}</a></h3>
                <p class="description">@{{description}}</p>
            </div>
            <span class="blu">@{{address}}</span>
        </div>
    </div>
  </script>

@endsection
