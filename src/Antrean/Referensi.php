<?php
namespace Mbahmario\Bpjs\Antrean;

use Mbahmario\Bpjs\BpjsService;

class Referensi extends BpjsService
{
    public function referensiPoli()
    {
        $header = [
            'Content-Type'=>'application/json'
        ];
        $response = $this->get('ref/poli');
        
        return json_decode($response,true);
    }
    public function referensiDokter()
    {
        $header = [
            'Content-Type'=>'application/json'
        ];
        $response = $this->get('ref/dokter');
        
        return json_decode($response,true);
    }
    public function referensiPoliFinger()
    {
        $header = [
            'Content-Type'=>'application/json'
        ];
        $response = $this->get('ref/poli/fp');
        
        return json_decode($response,true);
    }
    
    public function referensiJadwalDokter($poli = null, $tgl = null)
    {
        $header = [
            'Content-Type'=>'application/json'
        ];
        $response =$this->get('jadwaldokter/kodepoli/'.$poli.'/tanggal/'.$tgl);
        
        return json_decode($response,true);
    }
    public function updateJadwalDokter($data = [])
    {
        $header = [
            'Content-Type'=>'application/json'
        ];
        $response = $this->post('jadwaldokter/updatejadwaldokter', $data, $header);
        return json_decode($response,true);
    }
   
}