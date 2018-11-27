<?php
namespace Drupal\acquia_api\Controller;

/**
 * get groups that contains "expired"
 */

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request; 
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
//use Drupal\my_api_client\MyClient;

class  acquiaController extends ControllerBase {

public function testMethod(){

       $client = \Drupal::httpClient();

  try {
    $response = $client->get('http://importantsafetyghuqazsgzf.devcloud.acquia-sites.com/jsonapi/node/ISafetyInfo');
    
    $data = $response->getBody();
   // $responseCode = $response->getStatusCode();
    $myarray= json_decode($data);

   // return new Response($data);
  // return new Response($responseCode );

     return new Response(var_dump($myarray));
  }

  catch (RequestException $e) {
    watchdog_exception('acquia_api', $e->getMessage());
  

}
}

 // public function backup_site ($site_id){

    //get the site id to back up the site
   // $backup_endpoint = " https://www.dev-otsuka.acsitefactory.com/api/v1/sites/{site_id}/backup "

    // get the $backup_id

  //}

//  public function get_bkup_url($site_id,$backup_id ){
    // pass it the site id
     //call the function backup_url()
  //   $backup_endpoint_url = "GET /api/v1/sites/{site_id}/backups/{backup_id}/url"

     // write the url in file or table


 // }
 // public function post_site_backup($config, $site, $env ) {
   // $backup_endpoint = acsf_tools_get_factory_url($config, "/api/v1/sites/$site->id/backup", $env);
   // $post_data = array(
     // 'label' => $site->site . ' ' . date('m-d-Y g:i')
   // );

//}
//   public function delete_sites_already_backup($site_id){
         //get the id
         //delete the site
         //Delete endpoint 
     //  $delete_endpoint=  https://www.dev-otsuka.acsitefactory.com/api/v1/sites/{site_id} \
   // -X DELETE -v -u {user_name}:{api_key}



    //}
}
