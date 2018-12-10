<?php

/**
 * @file
 * Contains \Drupal\acquia_api\Form\AcquiaApiFormService
 */
namespace Drupal\acquia_api\Form;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Database\Database;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Component\Serialization\Json;
/**
 * Provides a form to get the usr-name,password api key to send to acquia.
 */
class AcquiaApiFormService extends FormBase {

protected $my_api;

public function __construct($my_api){

  $this->my_api = $my_api;
}

/**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container){

    // $my_api = $container->get('my_acquia_call');

    // return new static ($my_api);
   return new static ($container->get('my_acquia_call'));


}
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'acqui_api_formService';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
   
   
    $form['name'] = array(
      '#title' => t('username'),
      '#type' => 'textfield',
      '#size' => 25,
      '#description' => t(""),
      '#required' => TRUE,
    );
      $form['password'] = array(
      '#title' => t('password'),
      '#type' => 'password',
      '#size' => 25,
      '#description' => t(""),
      '#required' => TRUE,
    );
      $form['api_key'] = array(
      '#title' => t('Api key'),
      '#type' => 'textfield',
      '#size' => 25,
      '#description' => t(""),
      '#required' => TRUE,
    );
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Run'),
    );
    
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    
      // get the user id.

    $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
   

 // get the form input name, password, api_key to append to the request query
      // make the request to get the group with filter .
   
 
    $mydata =  $this->my_api->get_group();
     
   // $method = 'GET';
   // $endpoint= 'http://importantsafetyghuqazsgzf.devcloud.acquia-sites.com/jsonapi/node/ISafetyInfo';
   // $query = array ('include'=>'field_add_content',
              // 'filter[title][condition][path]'=>'title',
              // 'filter[title][condition][value]'=>'testing api request_with_include',

          // );
   // $body = json_encode($body);
   //  $mydata = $this->my_api->request($method, $endpoint, $query);  
   
   //  $result =Json::decode($mydata) ;
     $result =$mydata;
    
    // loop thru the response to get the $group_id , $site_name, $site_id

    
    if(!empty($result))
    
      {   
           // get $site_id

            foreach ($result as $result){
               $site_name = $result->title;
               $uid = $user->id();
               $bkup_url = $result->title;
          // $site_name = $result['title'];
              // $uid = $user->id();
              // $site_id = $result-.id;
               

         // call the backup function, provide it the $site_id
 
         //$this->my_api->backup_site ($site_id); 
         
        // get $back_up_id to get the back_up_url.
         


        // insert into the database for the reports of sites backep-up and deleted
   
   // $this->my_api->sites_list($uid,$site_name,$bkup_url);
    
               db_insert('acquia_api')
                 ->fields(array( 
                  'uid' => $user->id(),
                  'site_name' =>$site_name,
                   'bkup_url' =>$bkup_url,
                    'created' =>time(),

                  ))
                  ->execute();

    //$this->my_api->backup_site ($site_id);   
     drupal_set_message(t('Thank you. '.$site_name." ".$bkup_url." "."you can view the sites backed up and deleted below  "));  
      
       // redirect to the report logs of the sites backedup and deleted.
 
         $form_state->setRedirect('acquia_api.report');
           
         }

       }

   
  }

}
