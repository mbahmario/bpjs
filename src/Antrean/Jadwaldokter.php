<?php
namespace Mbahmario\Bpjs\Antrean;

use Mbahmario\Bpjs\BpjsService;

class Jadwaldokter extends BpjsService
{
    public function getJadwal($kd_poli = null, $tanggal = null)
    {
        $response = $this->get('jadwaldokter/kodepoli/'.$kd_poli.'/tanggal'.'/'.$tanggal);
        return json_decode($response,true);
    }
    public function update($data = [])
    {
        $header = [
            'Content-Type'=>'application/json'
        ];
        $response = $this->post('jadwaldokter/updatejadwaldokter', $data, $header);
        return json_decode($response,true);
    }
}