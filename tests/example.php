<?php

require_once __DIR__.'/../vendor/autoload.php';





//use referensi serivce
$referensi = new \Mbahmario\Bpjs\Antrean\Antrean($antrean_v2_conf);

$data =array(
    "kodebooking"=>"1648603326B093",
);

var_dump($referensi->getListTask($data));


// //use referensi serivce
// $referensi = new \Mbahmario\Bpjs\VClaim\Referensi($vclaim_conf);
// var_dump($referensi->diagnosa('A00'));

// //use peserta service
// $peserta = new \Mbahmario\Bpjs\VClaim\Peserta($vclaim_conf);
// var_dump($peserta->getByNoKartu('123456789','2018-09-16'));
