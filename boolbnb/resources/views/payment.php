<?php


use App\Sponsorship;
// require_once ("token_generate.php");
header('Content-Type: application/json');

$gateway = new Braintree\Gateway([
    'environment' => 'sandbox',
    'merchantId' => '3fq8j6rpxv3kwq76',
    'publicKey' => 'bf4gncbmkr42nrqy',
    'privateKey' => '6434d1448254d734fcc5e904ee75fff4'
]);
$result = $gateway->transaction()->sale([
    'amount' => $sponsorshipstype['price'],
    'paymentMethodNonce' => "fake-valid-nonce",
    'options' => [ 'submitForSettlement' => true ]
  ]);

  if ($result->success) {
    // print_r("success!: " . $result->transaction->id);
    $result_payment = "successo";
    $sponsorship = new Sponsorship;
    $sponsorship['startDate'] = $start_date;
    $sponsorship['title'] = $title;
    $sponsorship['apartment_id'] = $apartment['id'];
    $sponsorship['sponsorshipstype_id'] = $sponsorshipstype['id'];
    $sponsorship -> save();

  }
  else if ($result->transaction) {
    $result_payment = "error";

    // print_r("Error processing transaction:");
    // print_r("\n  code: " . $result->transaction->processorResponseCode);
    // print_r("\n  text: " . $result->transaction->processorResponseText);
  }
else {
  $result_payment = "fallimento";

    // print_r("validation error\n");
    // print_r($result->errors->deepAll());
}

  // $gianfranco = 'marco rimane a fare front';
echo json_encode($result_payment);
