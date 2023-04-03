<?php
namespace Mbahmario\Bpjs;

use GuzzleHttp\Client;


class BpjsService{

    /**
     * Guzzle HTTP Client object
     * @var \GuzzleHttp\Client
     */

    private $clients;

    /**
     * Request headers
     * @var array
     */
    private $headers;

    /**
     * X-cons-id header value
     * @var int
     */
    private $cons_id;

    /**
     * X-Timestamp header value
     * @var string
     */
    private $timestamp;

    /**
     * X-Signature header value
     * @var string
     */
    private $signature;

    /**
     * @var string
     */
    private $secret_key;

    private $user_key;

    /**
     * @var string
     */
    private $base_url;

    /**
     * @var string
     */
    private $service_name;

    public function __construct($configurations)
    {
        $this->clients = new Client([
            'verify' => false
        ]);

        foreach ($configurations as $key => $val){
            if (property_exists($this, $key)) {
                $this->$key = $val;
            }
        }

        $this->setTimestamp()->setSignature()->setHeaders();
    }

    protected function setHeaders()
    {
        $this->headers = [
            'X-cons-id' => $this->cons_id,
            'X-Timestamp' => $this->timestamp,
            'X-Signature' => $this->signature,
            'user_key' => $this->user_key
        ];
        return $this;
    }

    protected function setTimestamp()
    {
        $dateTime = new \DateTime('now', new \DateTimeZone('UTC'));
        $this->timestamp = (string)$dateTime->getTimestamp();
        return $this;
    }

    protected function setSignature()
    {
        $data = $this->cons_id . '&' . $this->timestamp;
        $signature = hash_hmac('sha256', $data, $this->secret_key, true);
        $encodedSignature = base64_encode($signature);
        $this->signature = $encodedSignature;
        return $this;
    }

    protected function decryptResponse($string)
    {
       $key = $this->cons_id.$this->secret_key.$this->timestamp;

       $encrypt_method = 'AES-256-CBC';
       $key_hash = hex2bin(hash('sha256', $key));

       $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);


      $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key_hash, OPENSSL_RAW_DATA, $iv);

      return \LZCompressor\LZString::decompressFromEncodedURIComponent($output);

    }

    protected function get($feature)
    {
        $this->headers['Content-Type'] = 'application/json; charset=utf-8';
        try {
            $response = $this->clients->request(
                'GET',
                $this->base_url . '/' . $this->service_name . '/' . $feature,
                [
                    'headers' => $this->headers
                ]
            )->getBody()->getContents();

            if($this->service_name == "antreanrs"){
                $result = $this->antreanResponse($response);

            }else{
                $result = $this->vclaimResponse($response);
            }

        } catch (\Exception $e) {

            $result = json_encode($e->getMessage());
        }


        return   $result ;
    }

    protected function post($feature, $data = [], $headers = [])
    {
        $this->headers['Content-Type'] = 'application/x-www-form-urlencoded';
        if(!empty($headers)){
            $this->headers = array_merge($this->headers,$headers);
        }
        try {
            $response = $this->clients->request(
                'POST',
                $this->base_url . '/' . $this->service_name . '/' . $feature,
                [
                    'headers' => $this->headers,
                    'json' => $data,
                ]
            )->getBody()->getContents();

            if($this->service_name == "antreanrs"){
                $result = $this->antreanResponse($response);

            }else{
                $result = $this->vclaimResponse($response);
            }

        } catch (\Exception $e) {

            $result = json_encode($e->getMessage());
        }


        return   $result ;
    }

    protected function put($feature, $data = [])
    {
        $this->headers['Content-Type'] = 'application/x-www-form-urlencoded';
        try {
            $response = $this->clients->request(
                'PUT',
                $this->base_url . '/' . $this->service_name . '/' . $feature,
                [
                    'headers' => $this->headers,
                    'json' => $data,
                ]
            )->getBody()->getContents();

            if($this->service_name == "antreanrs"){
                $result = $this->antreanResponse($response);

            }else{
                $result = $this->vclaimResponse($response);
            }

        } catch (\Exception $e) {

            $result = json_encode($e->getMessage());
        }


        return   $result ;
    }


    protected function delete($feature, $data = [])
    {
        $this->headers['Content-Type'] = 'application/x-www-form-urlencoded';
        try {
            $response = $this->clients->request(
                'DELETE',
                $this->base_url . '/' . $this->service_name . '/' . $feature,
                [
                    'headers' => $this->headers,
                    'json' => $data,
                ]
            )->getBody()->getContents();
            if($this->service_name == "antreanrs"){
                $result = $this->antreanResponse($response);

            }else{
                $result = $this->vclaimResponse($response);
            }

        } catch (\Exception $e) {

            $result = json_encode($e->getMessage());
        }


        return   $result ;
    }

    protected function antreanResponse($response){

        $decode_response = json_decode($response);

        if($decode_response->metadata->code == 200 ){
            if(property_exists($decode_response, 'response')){
                $bodyResponse = $this->decryptResponse($decode_response->response);
            }else{
                $bodyResponse =$decode_response->metadata->message;
            }

        }else{
            if(property_exists($decode_response, 'response')){
                $bodyResponse = $this->decryptResponse($decode_response->response);
            }else{
                $bodyResponse =$decode_response->metadata;
            }
        }

        $data = [
            'metadata'=>$decode_response->metadata,
            'response'=> $bodyResponse
        ];

        return json_encode($data);

    }

    protected function vclaimResponse($response){

        $decode_response = json_decode($response);

        if($decode_response->metaData->code == 200 ){
            if(property_exists($decode_response, 'response')){
                $bodyResponse = $this->decryptResponse($decode_response->response);
            }else{
                $bodyResponse =$decode_response->metaData->message;
            }
        }else{
            if(property_exists($decode_response, 'response')){
                $bodyResponse = $this->decryptResponse($decode_response->response);
            }else{
                $bodyResponse =$decode_response->metaData->message;
            }
        }

        $data = [
            'metadata'=>$decode_response->metaData,
            'response'=> $bodyResponse
        ];

        return json_encode($data);

    }


}
