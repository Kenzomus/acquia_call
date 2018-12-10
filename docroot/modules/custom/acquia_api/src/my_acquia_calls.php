<?php

namespace Drupal\acquia_api;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Database\Database;
use Guzzle\Http\Client;
use Drupal\Component\Serialization\Json;
class my_acquia_calls {



public function get_group(){

       $client = \Drupal::httpClient();
  
       // $client = new Client();
  try {
    $response = $client->get('http://importantsafetyghuqazsgzf.devcloud.acquia-sites.com/jsonapi/node/ISafetyInfo');
   // $response = $client->send();
    $data =$response->getBody();
   // $responseCode = $response->getStatusCode();
    
     
  
   return new Response($data);
   
  
    
  }

  catch (RequestException $e) {
    watchdog_exception('acquia_api', $e->getMessage());


}
}

public function get_site ($group_id) {
    
      // get the site if group id is in array
      // loop thru the array 
      //https://www.dev-otsuka.acsitefactory.com/api/v1/sites?limit=20&page=2' \
    //-v -u {user_name}:{api_key}&filter[name][condition][path]=groups

    // get the site id to pass to the backup function

  }

public function backup_site ($site_id){

    //get the site id to back up the site
   // $backup_endpoint = " https://www.dev-otsuka.acsitefactory.com/api/v1/sites/{site_id}/backup "

    // get the $backup_id
drupal_set_message(t('Thank your site has been  backed up '));
  }
public function get_bkup_url($site_id,$backup_id ){
    // pass it the site id
     //call the function backup_url()
    // $backup_endpoint_url = "GET /api/v1/sites/{site_id}/backups/{backup_id}/url"

     // write the url in file or table


  }
public function delete_sites_already_backup($site_id){
         //get the id
         //delete the site
         //Delete endpoint 
      // $delete_endpoint=  https://www.dev-otsuka.acsitefactory.com/api/v1/sites/{site_id} \
   // -X DELETE -v -u {user_name}:{api_key}

drupal_set_message(t('Thank you. Sites deleted '));

    }



public function sites_list($uid,$site_name,$bkup_url){

     db_insert('acquia_api')
      ->fields(array( 
       'uid' => $uid(),
       'site_name' =>$site_name,
       'bkup_url'=>$bkup_url,
       'created' => time(),

       ))
      ->execute();



drupal_set_message(t('Thank you .records inserted '));

}

public function request($method, $endpoint, $query) {
          $client = \Drupal::httpClient();
        
  $response = $client->{$method}($endpoint,$query);
   // $response = $client->send();
}
}
