<?php
namespace Mbahmario\Bpjs\Apotek;

use Mbahmario\Bpjs\BpjsService;

class Monitoring extends BpjsService
{

    public function list($bulan, $tahun, $jenisObat, $status)
    {
        $response = $this->get('monitoring/klaim/'.$bulan.'/'.$tahun.'/'.$jenisObat.'/'.$status);
        return json_decode($response, true);
    }
}