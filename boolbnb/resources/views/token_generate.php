<?php
header("Content-Type: application/json");
$gateway = new Braintree\Gateway([
    'environment' => 'sandbox',
    'merchantId' => '3fq8j6rpxv3kwq76',
    'publicKey' => 'bf4gncbmkr42nrqy',
    'privateKey' => '6434d1448254d734fcc5e904ee75fff4'
]);
$client_token = $gateway-> clientToken() -> generate();

echo json_encode($client_token);
