<?php
namespace custom_http_client\Tests;
use Guzzle\http\client;

//class custom_http_client_ControllerTest extends \PHPUnit_Framework_TestCase
//{

    function testGet(){
        try {
    
    
            $request = $client->get('https://api.github.com/user', [
            'auth' => ['kenzomus','Thiam#5547']
          ]);
           $response = json_decode($request->getBody());
          }
          catch (RequestException $e) {
            watchdog_exception('my_module', $e->getMessage());
          }
       return $response->getStatusCode();
    }

//}