<?php
namespace Mbahmario\Bpjs\VClaim;

use Mbahmario\Bpjs\BpjsService;

class Rujukan extends BpjsService
{

    public function insertRujukan($data = [])
    {
        $response = $this->post('Rujukan/insert', $data);
        return json_decode($response, true);
    }
    //V2.0
    public function insertRujukanV2($data = [])
    {
        $response = $this->post('Rujukan/2.0/insert', $data);
        return json_decode($response, true);
    }
    
    public function updateRujukan($data = [])
    {
        $response = $this->put('Rujukan/update', $data);
        return json_decode($response, true);
    }
    //V2.0
    public function updateRujukanV2($data = [])
    {
        $response = $this->put('Rujukan/2.0/Update', $data);
        return json_decode($response, true);
    }
    public function deleteRujukan($data = [])
    {
        $response = $this->delete('Rujukan/delete', $data);
        return json_decode($response, true);
    }

    public function cariByNoRujukan($searchBy, $keyword)
    {
        if ($searchBy == 'RS') {
            $url = 'Rujukan/RS/'.$keyword;
        } else {
            $url = 'Rujukan/'.$keyword;
        }
        $response = $this->get($url);
        return json_decode($response, true);
    }

    public function cariByNoKartu($searchBy, $keyword, $multi = false)
    {
        $record = $multi ? 'List/' : '';
        if ($searchBy == 'RS') {
            $url = 'Rujukan/RS/'.$record.'Peserta/'.$keyword;
        } else {
            $url = 'Rujukan/'.$record.'Peserta/'.$keyword;
        }
        $response = $this->get($url);
        return json_decode($response, true);
    }

    public function cariByTglRujukan($searchBy, $keyword)
    {
        if ($searchBy == 'RS') {
            $url = 'Rujukan/RS/TglRujukan/'.$keyword;
        } else {
            $url = 'Rujukan/List/Peserta/'.$keyword;
        }
        $response = $this->get($url);
        return json_decode($response, true);
    }
    //v.2
    public function insertRujukanKhusus($data = [])
    {
        $response = $this->post('Rujukan/Khusus/insert', $data);
        return json_decode($response, true);
    }
    public function deleteRujukanKhusus($data = [])
    {
        $response = $this->post('Rujukan/Khusus/delete', $data);
        return json_decode($response, true);
    }
    public function listRujukanKhusus($bulan, $tahun)
    {
        $url = 'Rujukan/Khusus/List/Bulan/'.$bulan.'/Tahun/'.$tahun;
        $response = $this->get($url);
        return json_decode($response, true);
    }
    public function listSpesialistikRujukan($kodePPK, $tglRujukan)
    {
        $url = 'Rujukan/ListSpesialistik/PPKRujukan/'.$kodePPK.'/TglRujukan/'.$tglRujukan;
        $response = $this->get($url);
        return json_decode($response, true);
    }
    public function listSarana($keyword)
    {
        $url = 'Rujukan/ListSarana/PPKRujukan/'.$keyword;
        $response = $this->get($url);
        return json_decode($response, true);
    }
    public function listRujukanKeluar($dateFrom, $dateTo)
    {
        $url = 'Rujukan/Keluar/List/tglMulai/'.$dateFrom.'/tglAkhir/'.$dateTo;
        $response = $this->get($url);
        return json_decode($response, true);
    }
    public function cariRujukanKeluarById($keyword)
    {
        $url = 'Rujukan/Keluar/'.$keyword;
        $response = $this->get($url);
        return json_decode($response, true);
    }
    public function listSepByNoRujukan($jnsRujukan, $noRujukan)
    {
        $url = 'Rujukan/JumlahSEP/'.$jnsRujukan.'/'.$noRujukan;
        $response = $this->get($url);
        return json_decode($response, true);
    }
}
