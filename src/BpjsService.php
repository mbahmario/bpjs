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

        //set X-Timestamp, X-Signature, and finally the headers
        $this->setTimestamp()->setSignature()->setHeaders();
    }

    protected function setHeaders()
    {
        $this->headers = [
            'X-cons-id' => $this->cons_id,
            'X-Timestamp' => $this->timestamp,
            'X-Signature' => $this->signature
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
        } catch (\Exception $e) {
            $response = $e->getMessage();
        }
        return $response;
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
        } catch (\Exception $e) {
            $response = $e->getResponse()->getBody();
        }
        return $response;
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
        } catch (\Exception $e) {
            $response = $e->getResponse()->getBody();
        }
        return $response;
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
        } catch (\Exception $e) {
            $response = $e->getResponse()->getBody();
        }
        return $response;
    }

}
