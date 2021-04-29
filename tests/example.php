<?php

require_once __DIR__.'/../vendor/autoload.php';

//use your own bpjs config
$vclaim_conf = [
    'cons_id' => '12345',
    'secret_key' => '12345',
    'base_url' => 'https://new-api.bpjs-kesehatan.go.id:8080',
    'service_name' => 'new-vclaim-rest'
];

$antrean_conf = [
    'cons_id' => '12334',
    'secret_key' => '1223',
    'base_url' => 'https://antrean.bpjs-kesehatan.go.id',
    'service_name' => 'arsws/rest/v2'
];

$dev_vclaim_conf = [
    'cons_id' => '1222',
    'secret_key' => '12212',
    'base_url' => 'https://dvlp.bpjs-kesehatan.go.id',
    'service_name' => 'vclaim-rest-1.1'
];

$dev_antrean_conf = [
    'cons_id' => '12212',
    'secret_key' => '12212',
    'base_url' => 'https://dvlp.bpjs-kesehatan.go.id:8888',
    'service_name' => 'arsws/rest/v1'
];


//use referensi serivce
$referensi = new \Mbahmario\Bpjs\Antrean\Antrean($antrean_conf);
$data =array(
    "kodebooking"=>"A0001#1619658443",
);
var_dump($referensi->getListTask($data));


// //use referensi serivce
// $referensi = new \Mbahmario\Bpjs\VClaim\Referensi($vclaim_conf);
// var_dump($referensi->diagnosa('A00'));

// //use peserta service
// $peserta = new \Mbahmario\Bpjs\VClaim\Peserta($vclaim_conf);
// var_dump($peserta->getByNoKartu('123456789','2018-09-16'));
