<?php

require_once __DIR__.'/../vendor/autoload.php';



$config_vclaim = [
    'cons_id' =>  env('CONS_ID'),
    'secret_key' => env('SECRET_KEY'),
    'user_key' =>  env('USER_KEY'),
    'base_url' => 'https://apijkn.bpjs-kesehatan.go.id',
    'service_name' => 'vclaim-rest'
];


//use referensi serivce
$referensi = new \Mbahmario\Bpjs\VClaim\RencanaKontrol($config_vclaim);

$data =[];
// var_dump($referensi->cariByNoKartu('04','2023','CARD NUMBER','2'));

var_dump($referensi->cariByNoSuratKontrol('1017R0020323K001801'));

