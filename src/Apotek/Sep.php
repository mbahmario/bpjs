<?php
namespace Mbahmario\Bpjs\Apotek;

use Mbahmario\Bpjs\BpjsService;

class Sep extends BpjsService
{
    //add new methods to handle SEP
    public function sep($noSep)
    {
        $response = $this->get('sep/'.$noSep);
        return json_decode($response, true);
    }
    
   
}