<?php
namespace Mbahmario\Bpjs\Apotek;

use Mbahmario\Bpjs\BpjsService;

class Pelayanan extends BpjsService
{

    public function delete($data=[])
    {
        $response = $this->delete('pelayanan/obat/hapus', $data);
        return json_decode($response, true);
    }
    public function list($noSep)
    {
        $response = $this->get('obat/daftar/'.$noSep);
        return json_decode($response, true);
    }
    public function history($fromDate, $toDate, $noKartu)
    {
        $response = $this->get('obat/history/'.$fromDate.'/'.$toDate.'/'.$noKartu);
        return json_decode($response, true);
    }
    
   
}