@extends('layouts.mainLayout')

@section('content')
  @include('components.header_generic')

<div class="container content">
    <div class="col-12">
      <div class="space"></div>
      <div class="space"></div>
      <h1 class="blu mb-5">I Miei Messaggi</h1>

      <section id="section-messages">
          @foreach ($ordered_messages as $message)
            <div class="messaggio_destinatario mt-2 w-100 h-100">
            <input type="checkbox" name="messaggi" value="">
            <span>{{$message['email']}} </span>
            <span class="oggetto-messaggi"> <strong>Appartamento {{$message['name']}}</strong>
            <span class="text_msg"> - {{$message['text']}}</span></span>
            <span class="date_msg">{{$message['created_at']}}</span>
            </div>
          @endforeach
        </section>
    </div>
  </div>
@endsection
