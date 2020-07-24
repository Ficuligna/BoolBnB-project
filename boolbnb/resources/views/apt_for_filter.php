<?php
header("Content-Type: application/json");
$filtered_apt= [];
foreach ($apartments as $apartment) {
  unset($apartment["mq"]);
  unset($apartment["bathrooms"]);
  $filtered_apt[] =$apartment;
}
echo json_encode($filtered_apt);

 ?>
