<?php
namespace Drupal\acquia_api\Controllers;

/**
 * get groups that contains "expired"
 */


 
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
//use Drupal\my_api_client\MyClient;

 acquiaController extends ControllerBase;

 function get_group (){

  $client = \Drupal::httpClient();

  try {
    $response = $client->get('https:///www.dev-otsuka.acsitefactory.com/api/v1/groups');
    $data = $response->getBody();
    return $data;
  }
  
  catch (RequestException $e) {
    watchdog_exception('acquia_api', $e->getMessage());
  }

  //"https://www.dev-otsuka.acsitefactory.com/api/v1/sites?limit=20&page=2' \-v -u {user_name}:{api_key}&filter[name][condition][path]=groups"

  //$end_point = 'https:///www.dev-otsuka.acsitefactory.com/api/v1/groups?page=2&limit=20'&filter[group_name][condition][path]=group_name&filter[group_name][condition][operator]=CONTAINS&filter[group_name][condition][value]=Expired&_format=json'
  
  // maybe collect the parameters in a more elegant way
     
  // get the data, if response == 200
   
  // use json_decode to get it into array 
  




        
 }
  public function get_site (group_list[]) {
    
      // get the site if group id is in array
      // loop thru the array 
      //https://www.dev-otsuka.acsitefactory.com/api/v1/sites?limit=20&page=2' \
    //-v -u {user_name}:{api_key}&filter[name][condition][path]=groups

    // get the site id to pass to the backup function

  }
  public function backup_site ($site_id){

    //get the site id to back up the site
    $backup_endpoint = " https://www.dev-otsuka.acsitefactory.com/api/v1/sites/{site_id}/backup "

    // get the $backup_id

  }

  public function get_bkup_url($site_id,backup_id ){
    // pass it the site id
     //call the function backup_url()
     $backup_endpoint_url = "GET /api/v1/sites/{site_id}/backups/{backup_id}/url"

     // write the url in file or table


  }
  public function post_site_backup($config, $site, $env) {
    $backup_endpoint = acsf_tools_get_factory_url($config, "/api/v1/sites/$site->id/backup", $env);
    $post_data = array(
      'label' => $site->site . ' ' . date('m-d-Y g:i')
    );

}
   public function delete_sites_already_backup($site_id){
         //get the id
         //delete the site
         //Delete endpoint 
       $delete_endpoint=  https://www.dev-otsuka.acsitefactory.com/api/v1/sites/{site_id} \
    -X DELETE -v -u {user_name}:{api_key}



    }
