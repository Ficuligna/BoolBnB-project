@extends('layouts.mainLayout')

@section('content')
<h1>I Miei Messaggi</h1>
  <div class="contenitore_messaggi">
    @foreach ($ordered_messages as $message)

      <div class="messaggio_destinatario">
        <h3>Appartamento "{{$message['apartment_id']}}" Messaggio "{{$message['id']}}" </h3>
        <p>{{$message['text']}}   <br><br><br>
          Inviato da: {{$message['email']}}
         </p>

      </div>
    @endforeach
  </div>
@endsection
