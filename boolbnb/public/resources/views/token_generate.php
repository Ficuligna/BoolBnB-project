<?php
header("Content-Type: application/json");
$gateway = new Braintree\Gateway([
    'environment' => 'sandbox',
    'merchantId' => 'bhdn8xt35v7xfcqh',
    'publicKey' => 'vrsqzfx3hgsrtmbj',
    'privateKey' => '3d588878fe228fcb4af950bcb064c499'
]);

$client_token = $gateway-> clientToken() -> generate();

echo json_encode($client_token);
