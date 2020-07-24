
@extends('layouts.mainLayout')

@section('content')
  @include('components.header_generic')
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
  <div class="foto">
<img src="/img/1-1.jpeg"/>
  </div>
<!-- foto appartamento -->
</div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
<div class="descr">
<!-- descrizione appartamento  -->
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor7
 incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
 exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
 irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
 nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
 qui officia deserunt mollit anim id est laborum.
</div>
    </div>
    <div class="col-12 col-sm-12 offset-md-3 col-md-3 offset-lg-3 col-lg-3 offset-xl-3 col-xl-3 ">
<div class="carat">
<!-- caratteristiche appartamento -->
<ul>
  <li>Numero di stanze</li>
  <li>Numero posto letti</li>
  <li>Numero di bagni</li>
  <li>Metri Quadri</li>
  <li>Indirizzo</li>
</ul>
</div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 ">
<div class="map">
<!-- mappa -->
<img src="/img/map.jpg"/>
</div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 offset-lg-1 col-lg-5 offset-xl-1 col-xl-5 ">
      <div class="bordo">

<div class="msg">
<!-- scrivi + email + messaggio -->
<h1> <strong>Scrivi al proprietario</strong> </h1>
<form class="" action="" method="post">

<div class="insert_dati">
  <input type="email" name="mail" id="mail_msg" class="form-control" placeholder="Email">
</div>
<div class="insert_dati">
  <input type="text" name="message" id="message" class="form-control" placeholder="Scrivi il tuo messaggio">
</div>

<div class="invia">
  <button type="submit" class="rimuovi" name="button">Invia</button>
</div>
</form>
</div>

</div>
    </div>

@endsection
