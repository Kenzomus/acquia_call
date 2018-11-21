<?php

namespace Drupal\custom_http_client;

use GuzzelHttp\Client;

class ClientFactory {

   /**
    * Return a configured Client object.
    */
    public function get(){
       $config = [
           'base_uri' => 'https://www.dev-otsuka.acsitefactory.com//api/v1/',
       ];

       $client = new Client($config);

       return $client;
      }









}
