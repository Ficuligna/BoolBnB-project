<?php
use App\Sponsorship;
header('Content-Type: application/json');

$gateway = new Braintree\Gateway([
    'environment' => 'sandbox',
    'merchantId' => 'bhdn8xt35v7xfcqh',
    'publicKey' => 'vrsqzfx3hgsrtmbj',
    'privateKey' => '3d588878fe228fcb4af950bcb064c499'
]);
$result = $gateway->transaction()->sale([
    'amount' => $sponsorshipstype['price'],
    'paymentMethodNonce' => "fake-valid-nonce",
    'options' => [ 'submitForSettlement' => true ]
  ]);

  if ($result->success) {
    // print_r("success!: " . $result->transaction->id);
    $result = "successo";
    $sponsorship = new Sponsorship;
    $sponsorship['startDate'] = $start_date;
    $sponsorship['title'] = $title;
    $sponsorship['apartment_id'] = $apartment['id'];
    $sponsorship['sponsorshipstype_id'] = $sponsorshipstype['id'];
    $sponsorship -> save();

  }
  else if ($result->transaction) {
    $result = "error";

    // print_r("Error processing transaction:");
    // print_r("\n  code: " . $result->transaction->processorResponseCode);
    // print_r("\n  text: " . $result->transaction->processorResponseText);
  }
else {
  $result = "fallimento";

    // print_r("validation error\n");
    // print_r($result->errors->deepAll());
}

  // $gianfranco = 'marco rimane a fare front';
echo json_encode($result);
