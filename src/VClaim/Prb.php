<?php
namespace Mbahmario\Bpjs\VClaim;

use Mbahmario\Bpjs\BpjsService;

class Prb extends BpjsService
{
    public function insertPRB($data = [])
    {
        $response = $this->post('PRB/insert', $data);
        return json_decode($response, true);
    }
    public function updatePRB($data = [])
    {
        $response = $this->put('PRB/Update', $data);
        return json_decode($response, true);
    }
    public function deletePRB($data = [])
    {
        $response = $this->delete('Rujukan/Delete', $data);
        return json_decode($response, true);
    }
    public function cariSRB($noSrb,$noSep)
    {
        $response = $this->get('prb/'.$noSrb.'/nosep/'.$noSep);
        return json_decode($response, true);
    }
    public function listSrb($dateFrom,$dateTo)
    {
        $response = $this->get('prb/tglMulai/'.$dateFrom.'/tglAkhir/'.$dateTo);
        return json_decode($response, true);
    }
}