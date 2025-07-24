<?php
namespace Mbahmario\Bpjs\Apotek;

use Mbahmario\Bpjs\BpjsService;

class Resep extends BpjsService
{

    public function insert($data=[])
    {
        $response = $this->post('sjpresep/v3/insert', $data);
        return json_decode($response, true);
    }
    public function delete($data=[])
    {
        $response = $this->delete('hapusresep', $data);
        return json_decode($response, true);
    }
     public function list($data=[])
    {
        $response = $this->post('daftarresep', $data);
        return json_decode($response, true);
    }
   
}