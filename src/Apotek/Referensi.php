<?php
namespace Mbahmario\Bpjs\Apotek;

use Mbahmario\Bpjs\BpjsService;

class Referensi extends BpjsService
{
    //add new methods to get various references
    public function getDpho()
    {
        $response = $this->get('referensi/dpho');
        return json_decode($response, true);
    }
    public function getPoli($kodePoli)
    {
        $response = $this->get('referensi/poli/'.$kodePoli);
        return json_decode($response, true);
    }
    public function getFaskes($jenisFaskes, $namaFaskes)   
    {
        $response = $this->get('referensi/ppk/'.$jenisFaskes.'/'.$namaFaskes);
        return json_decode($response, true);
    }
    public function getSettingPpk($kodeApotek)   
    {
        $response = $this->get('referensi/settingppk/read/'.$kodeApotek);
        return json_decode($response, true);
    }
    public function getSpesialistik()   
    {
        $response = $this->get('referensi/spesialistik');
        return json_decode($response, true);
    }
     public function getObat($jenisObat, $tglResep, $keyword)   
    {
        $response = $this->get('referensi/obat/'.$jenisObat.'/'.$tglResep.'/'.$keyword);
        return json_decode($response, true);
    }
   
}