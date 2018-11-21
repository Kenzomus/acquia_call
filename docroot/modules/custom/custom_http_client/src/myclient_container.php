</php
**
   * GuzzleHttp\Client definition.
   *
   * @var GuzzleHttp\Client
   *
   * protected $custom_http_client_client;
   */

  public function __construct( Client $custom_http_client_client) 
   {
    parent::__construct();
        $this->custom_http_client_client = $custom_http_client_client;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('custom_http_client.client')
    );
  }
