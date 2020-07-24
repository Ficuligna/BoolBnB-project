@extends('layouts.mainLayout')

@section('content')
  @include('components.header_generic')
  <div class="container content">
    <div class="paypay">
      <h1 class="w-100 text-center blu">{{$result}}!!</h1>
    </div>
  </div>

@endsection
