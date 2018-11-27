
<?php
 
namespace Drupal\acquia_api\Controller;
 
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\acquia_api\MyClient;
 
/**
 * Class MyController.
 *
 * @package Drupal\acquia_api\Controller
 */
class MyController extends ControllerBase {
 
  /**
   * Drupal\acquia_api\MyClient definition.
   *
   * @var \Drupal\acquia_api\MyClient
   */
  protected $myClient;
 
  /**
   * {@inheritdoc}
   */
  public function __construct(MyClient $my_client) {
    $this->myClient = $my_client;
  }
 
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('my_api.client')
    );
  }
 
  /**
   * Content.
   *
   * @return array
   *   Return array.
   */
  public function content() {
    $this->myClient->request());
    return [];
  }
}
public function request($method, $endpoint, $query, $body) {
  $response = $this->httpClient->{$method}(
    $this->base_uri . $endpoint,
    $this->buildOptions($query, $body)
  );
}
/**
 
*
*The request method accepts: A method (GET, POST, PATCH, DELETE, etc.) Endpoint (the API being used) Query (querystring parameters) Body

*You can adjust your method parameters to best fit the API you are working with. In this example, the parameters defined covered the needed functionality.

*$request = $this->myClient->request('post', 'people/v2/people', [], $body);
*Using httpClient directly would look something like:

*$response = $this->httpClient->post(
  'http://someapi.com/people/v2/people',
  *[
   * 'auth' => ['token', 'secret'],
  *  'body' => json_encode($body),
 * ]
*);
*Using httpClient instead of a service directly could litter hard coded values throughout your code base and insecurely expose authentication credentials.

*DELETE /api/v1/sites/{site_id}
*POST /api/v1/sites/{site_id}/backup
*curl 'https://www.demo.acquia-cc.com/api/v1/sites/123/backup' \
   * -X POST -H 'Content-Type: application/json' \
   * -d '{"label": "Weekly", "callback_url": "http://mysite.com", "callback_method": "GET"}' \
   * -v -u {user_name}:{api_key}
* list site backup in acquia
*GET /api/v1/sites/{site_id}/backups
*GET /api/v1/groups/{group_id} // 
*curl 'https://www.demo.acquia-cc.com/api/v1/groups/{group_id}' \
  *  -v -u {user_name}:{api_key}

*site factory api reference https://www.demo.acquia-cc.com/api/v1#List-site-backups 
*/

