<?php
namespace Mbahmario\Bpjs\Apotek;

use Mbahmario\Bpjs\BpjsService;

class Sep extends BpjsService
{

    public function sep($noSep)
    {
        $response = $this->get('sep/'.$noSep);
        return json_decode($response, true);
    }
    
   
}