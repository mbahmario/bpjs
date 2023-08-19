<?php
namespace Mbahmario\Bpjs\VClaim;

use Mbahmario\Bpjs\BpjsService;

class RencanaKontrol extends BpjsService
{

    public function insertRencanaKontrol($data = [])
    {
        $response = $this->post('RencanaKontrol/insert', $data);
        return json_decode($response, true);
    }
    public function updateRencanaKontrol($data = [])
    {
        $response = $this->put('RencanaKontrol/Update', $data);
        return json_decode($response, true);
    }
    public function deleteRencanaKontrol($data = [])
    {
        $response = $this->delete('RencanaKontrol/Delete', $data);
        return json_decode($response, true);
    }
    public function insertSPRI($data = [])
    {
        $response = $this->post('RencanaKontrol/InsertSPRI', $data);
        return json_decode($response, true);
    }
    public function updateSPRI($data = [])
    {
        $response = $this->put('RencanaKontrol/UpdateSPRI', $data);
        return json_decode($response, true);
    }
    public function cariByNoSuratKontrol($keyword)
    {
        $url = 'RencanaKontrol/noSuratKontrol/'.$keyword;
        $response = $this->get($url);
        return json_decode($response, true);
    }

    public function cariByNoKartu($month, $year, $cardNo, $filter)
    {
        $url = 'RencanaKontrol/ListRencanaKontrol/Bulan/'.$month.'/Tahun/'.$year.'/Nokartu/'.$cardNo.'/filter/'.$filter;
        $response = $this->get($url);
        return json_decode($response, true);
    }

    public function listDataSuratKontrol($dateFrom, $dateTo, $filter)
    {
        $url = 'RencanaKontrol/ListRencanaKontrol/tglAwal/'.$dateFrom.'/tglAkhir/'.$dateTo.'/filter/'.$filter;
        $response = $this->get($url);
        return json_decode($response, true);
    }
    public function cariByNoSEP($noSEP)
    {
        $url = 'RencanaKontrol/nosep/'.$noSEP;
        $response = $this->get($url);
        return json_decode($response, true);
    }
}
