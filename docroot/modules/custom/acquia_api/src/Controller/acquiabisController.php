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

class  acquiabisController extends ControllerBase {

/** 
   * acquia_api_calls
   *
   * @var acquia_api\acquia_api_calls
   */
 protected $my_api;

public function __construct($my_api){

  $this->my_api = $my_api;
}

public function test2Method(){

     //get the group list with expired in the group_name.

     $mydata =  $this->my_api->get_group();
       
     // $myarray = array();
      // $myarray['id']= $mydata->id;
      // $myarray['title']= $mydata->title;
 
       return new Response($mydata);
       

    // loop thru to  get the group id, to pass it  to get_site()
    
    // $mysite =  $this->my_api->get_site($group_id);
   
    // loop thru $mysite to get the site_id to pass to the function backup


}
/**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container){

     // $my_api = $container->get('my_acquia_call');

     // return new static ($my_api);
    return new static ($container->get('my_acquia_call'));


}

}
