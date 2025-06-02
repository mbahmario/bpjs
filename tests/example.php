<?php

require_once __DIR__.'/../vendor/autoload.php';



// $config_vclaim = [
//     'cons_id' =>  env('CONS_ID'),
//     'secret_key' => env('SECRET_KEY'),
//     'user_key' =>  env('USER_KEY'),
//     'base_url' => 'https://apijkn.bpjs-kesehatan.go.id',
//     'service_name' => 'vclaim-rest'
// ];

//use referensi serivce
$referensi = new \Mbahmario\Bpjs\VClaim\Prb($config_vclaim);
$keyword = '123';
$data =[];

$query = $referensi->cariSRB('6334879','123');

echo json_encode($query);
// var_dump($referensi->cariByNoKartu('04','2023','CARD NUMBER','2'));

//var_dump($referensi->cariByNoSuratKontrol('123'));

