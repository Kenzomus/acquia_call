<?php
use Guzzle\http\client;
function get_test(){
$client = \Drupal::httpClient();

  try {
    
    
    $request = $client->get('http://importantsafetyghuqazsgzf.devcloud.acquia-sites.com/jsonapi/node/ISafetyInfo');
    $response = json_decode($request->getBody());
   }
     catch (RequestException $e) {
    watchdog_exception('my_module', $e->getMessage());
    }
    return $response;
 // echo  $response->getStatusCode();
//$client = new \GuzzleHttp\Client();
//$res = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');
//echo $res->getStatusCode();
// 200


}
