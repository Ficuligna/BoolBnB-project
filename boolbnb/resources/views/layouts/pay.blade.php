@extends('layouts.mainLayout')

@section('content')
  @include('components.header_generic')

<div class="card-form">
  <div class="card-form__inner cf">
    <div class="card-form__element" data-input-text="Credit Card Number">
      <ul class="card-form__layers">
        <li class="card-form__layer">
          <form action="">
            <div id="cc-num" class="card-form__input card-form__hosted-field" /></form>
        </li>
      </ul>
    </div>
    <div class="card-form__element half" data-input-text="CVV">
      <ul class="card-form__layers">
        <li class="card-form__layer">
          <form action="">
            <div id="cc-cvv" class="card-form__input card-form__hosted-field"/>
          </form>
        </li>
      </ul>
    </div>
    <div class="card-form__element half" data-input-text="MM/YY">
      <ul class="card-form__layers">
        <li class="card-form__layer">
          <form action="">
            <div id="cc-expiration-date" class="card-form__input card-form__hosted-field" />
          </form>
        </li>
      </ul>
    </div>

    <button disabled value="submit" id="submit" class=""><div>Pay</div></button>
  </div>
</div>

<!-- Load the required client component. -->
<script src="https://js.braintreegateway.com/web/3.63.0/js/client.min.js"></script>

<!-- Load Hosted Fields component. -->
<script src="https://js.braintreegateway.com/web/3.63.0/js/hosted-fields.min.js"></script>

@endsection
