<?php

require_once __DIR__.'/../vendor/autoload.php';

//use your own bpjs config
$vclaim_v2_conf = [
    'cons_id' => '',
    'secret_key' => '',
    'user_key' => '',
    'base_url' => '',
    'service_name' => ''
];

$antrean_v2_conf = [
'cons_id' => '',
'secret_key' => '',
'user_key' => '',
'base_url' => '',
'service_name' => ''
];

//$referensi = new \Mbahmario\Bpjs\Antrean\Jadwaldokter($antrean_v2_conf);
// $referensi = new \Mbahmario\Bpjs\Antrean\Antrean($antrean_v2_conf);
// $data = [
//     "kodebooking"=>"1647384076RSCQ001",
// ];

$referensi = new \Mbahmario\Bpjs\VClaim\Antrean($vclaim_v2_conf);

$data = array(
    
        "kodebooking"=> "1647767809RSCQ001",
        "jenispasien"=> "JKN",
        "nomorkartu"=> "0001456045942",
        "nik"=> "3203024606140002",
        "nohp"=> "000000000000",
        "kodepoli"=> "ANA",
        "namapoli"=> "Anak",
        "pasienbaru"=> 0,
        "norm"=> "00368766",
        "tanggalperiksa"=> "2022-03-24",
        "kodedokter"=> 12345,
        "namadokter"=> "Dr. Hendra",
        "jampraktek"=> "08:00-16:00",
        "jeniskunjungan"=> 1,
        "nomorreferensi"=> "0001R0040116A000001",
        "nomorantrean"=> "A-12",
        "angkaantrean"=> 12,
        "estimasidilayani"=> 1615869169000,
        "sisakuotajkn"=> 5,
        "kuotajkn"=> 30,
        "sisakuotanonjkn"=> 5,
        "kuotanonjkn"=> 30,
        "keterangan"=> "Peserta harap 30 menit lebih awal guna pencatatan administrasi."
     
);
var_dump($referensi->addAntrean($data));


//use referensi serivce
// $referensi = new \Mbahmario\Bpjs\Antrean\Antrean($antrean_conf);
// $data =array(
//     "kodebooking"=>"A0001#1619658443",
// );
// var_dump($referensi->getListTask($data));


// //use referensi serivce
// $referensi = new \Mbahmario\Bpjs\VClaim\Referensi($vclaim_conf);
// var_dump($referensi->diagnosa('A00'));

// //use peserta service
// $peserta = new \Mbahmario\Bpjs\VClaim\Peserta($vclaim_conf);
// var_dump($peserta->getByNoKartu('123456789','2018-09-16'));
