<?php

namespace Rider\Autonavigation;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;


class AutoNavigationClient{
    
    
    protected $client;
           
    public function __construct($base_uri, $timeout) {    
        
        if(!isset($this->client)){
            $this->client = new Client([
                // Base URI is used with relative requests
                'base_uri' => $base_uri,
                // You can set any number of default request options.
                'timeout'  => $timeout,
            ]);
        }
    
    }
    
    
    public function getPagePDF($settings,$cmd){
        
               
        $body = new \stdClass();
        
        //Setting Body JSON for Rquest
        $body->settings = $settings;
        $body->cmd = $cmd;

        $bodyJSON = json_encode($body);
        
        $headers = ['Content-Type' => 'application/json' ];
        
        $request = new Request('POST', '/api/v1/request/pdf', $headers, $bodyJSON);
        $response = $this->client->send($request);
    
        return $response->getBody()->getContents();
                
    }


    public function getPageScreen($settings,$cmd,$options){
        
               
        $body = new \stdClass();
        
        //Setting Body JSON for Rquest
        $body->settings = $settings;
        $body->cmd = $cmd;
        $body->options = $options;

        $bodyJSON = json_encode($body);
        
        $headers = ['Content-Type' => 'application/json' ];
        
        $request = new Request('POST', '/api/v1/request/screen', $headers, $bodyJSON);
        $response = $this->client->send($request);
    
        return $response->getBody()->getContents();
                
    }


    
    
    public function getPageData($settings,$cmd,$schemaData){
        
        $body = new \stdClass();
        
        $body->settings = $settings;
        $body->cmd = $cmd;
        $body->schemaData = $schemaData;

        $bodyJSON = json_encode($body);
        
        $headers = ['Content-Type' => 'application/json' ];
        
        $request = new Request('POST', '/api/v1/request/data', $headers, $bodyJSON);
        $response = $this->client->send($request);
    
        return $response->getBody()->getContents();               
    }


    public function getPageExec($settings,$cmd){
        
        $body = new \stdClass();
        
        $body->settings = $settings;
        $body->cmd = $cmd;

        $bodyJSON = json_encode($body);

        $headers = ['Content-Type' => 'application/json' ];
        
        $request = new Request('POST', '/api/v1/request/exec', $headers, $bodyJSON);
        $response = $this->client->send($request);
    
        return $response->getBody()->getContents();               
    }
 
}

