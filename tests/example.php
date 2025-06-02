<?php

require_once __DIR__.'/../vendor/autoload.php';



// $config_vclaim = [
//     'cons_id' =>  env('CONS_ID'),
//     'secret_key' => env('SECRET_KEY'),
//     'user_key' =>  env('USER_KEY'),
//     'base_url' => 'https://apijkn.bpjs-kesehatan.go.id',
//     'service_name' => 'vclaim-rest'
// ];

$config_vclaim = [
    'cons_id' =>  18036,
    'secret_key' => '3wCA1C66C0',
    'user_key' =>  '88417e5de63ecbe9d90650ca106cd925',
    'base_url' => 'https://apijkn.bpjs-kesehatan.go.id',
    'service_name' => 'vclaim-rest'
];

// $config_antrean = [
//     'cons_id' =>  '18036',
//     'secret_key' => '3wCA1C66C0',
//     'user_key' =>  'ccf9c93fdaf305d62d0bf39f3e104682',
//     'base_url' => 'https://apijkn.bpjs-kesehatan.go.id',
//     'service_name' => 'antreanrs'
// ];


//use referensi serivce
$referensi = new \Mbahmario\Bpjs\VClaim\Prb($config_vclaim);
$keyword = '1017R002';
$data =[];

$query = $referensi->cariSRB('6334879','1017R0020525V003034');

echo json_encode($query);
// var_dump($referensi->cariByNoKartu('04','2023','CARD NUMBER','2'));

//var_dump($referensi->cariByNoSuratKontrol('1017R0020323K001801'));

