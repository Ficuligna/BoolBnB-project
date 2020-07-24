@extends('layouts.payment_layout')
@section('content')
<p id='apt_name'>{{$apartment['name']}}</p>
<p id='id' class='dispna'>{{$apartment['id']}}</p>
<p id='price'>{{$sponsorshipstype['price']}}</p>
<p id='duration'>{{$sponsorshipstype['duration']}}</p>
<input type="text" name="title" id="title">
<input type="date" name="start_date" id="start_date">
<div id="dropin-container"></div>
<button id="submit-button">Request payment method</button> 
<button type="button" class="dispna" id="pay">Pay</button>
@endsection


