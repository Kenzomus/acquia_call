<?php

/**
 * @file
 * Contains \Drupal\acquia_api\Form\AcquiaApiForm
 */
namespace Drupal\acquia_api\Form;

use Drupal\Core\Database\Database;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a form to get the usr-name,password api key to send to acquia.
 */
class AcquiaApiFormService extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'acqui_api_formService';
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
  public function buildForm(array $form, FormStateInterface $form_state) {
   // $node = \Drupal::routeMatch()->getParameter('node');
   // $nid = $node->nid->value;
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
    $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
      
    $mydata =  $this->my_api->get_group();
       
    // $myarray = array();
     // $myarray['id']= $mydata->id;
     // $myarray['title']= $mydata->title;

      return new Response($mydata);
      foreach ($datas in $data){
      $title = $mydata->title;
     db_insert('acquia_api')
      ->fields(array(
       
        
       'uid' => $user->id(),
       'site_name' =>$title,
       'created' => time(),

       ))
      ->execute();
      } 
   drupal_set_message(t('Thank you '));
  }
}

