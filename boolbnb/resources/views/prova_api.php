<?php
header("Content-Type: application/json");
$random_nums=[];
$random_apartments=[];
if (count($apartments) < 6) {
    $random_apartments = $apartments;
}else {
    for ($i=1; $i <= 6; $i++) {
      $num = rand(1,count($apartments));
      if (!in_array($num, $random_nums)) {
        $random_nums[] = $num;
      }else {
        $i--;
      };
    }
    foreach ($random_nums as $number) {
    $random_apartments[] = $apartments[$number-1] ;
    }
}

echo json_encode($random_apartments);

 ?>
