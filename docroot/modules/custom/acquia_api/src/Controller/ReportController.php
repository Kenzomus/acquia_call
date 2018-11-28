<?php
/**
 * @file
 * Contains \Drupal\acquia_api\Controller\ReportController.
 */
namespace Drupal\acquia_api\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;

/**
 * Controller for the site backup and deleted List Report
*/
class ReportController extends ControllerBase {

  /**
   * Gets all the sites name, id, backup_url, deleted and the user
   *
   * @return array
   */


  /**
   * Creates the report page.
   *
   * @return array
   *  Render array for report output.
   */

  protected function load() {
    $select = Database::getConnection()->select('acquia_api', 'r');
      // Join the users table, so we can get the entry creator's username.
    $select->join('users_field_data', 'u', 'r.uid = u.uid');


    // Select these specific fields for the output.
    $select->addField('u', 'name', 'username');
   // $select->addField('n', 'title');
    $select->addField('r', 'created');
    $entries = $select->execute()->fetchAll(\PDO::FETCH_ASSOC);
    return $entries;
  }

  public function report() {
    $content = array();
    $content['message'] = array(
     '#markup' => $this->t('Below is a list of all sites including username'),
    );
    $headers = array(
      t('Name'),
      t('site_name'),
      t('site_bkup_url'),
      t('created'),
    );
    $rows = array();
    foreach ($entries = $this->load() as $entry) {
       //Sanitize each entry.
      $rows[] = array_map('Drupal\Component\Utility\SafeMarkup::checkPlain', $entry);
    }
    $content['table'] = array(
      '#type' => 'table',
      '#header' => $headers,
      '#rows' => $rows,
      '#empty' => t('No entries available.'),
    );
   //  Don't cache this page.
    $content['#cache']['max-age'] = 0;
    return $content;

   // return new Response($content);
  }

}
