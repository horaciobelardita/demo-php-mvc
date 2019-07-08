<?php

// App Core
// parsea la Url en controller/method/params
class Core
{
  protected $controller = 'Pages';
  protected $method = 'index';
  protected $params = [];

  public function __construct()
  {
    // print_r($this->getUrl());
    $url = $this->getUrl();
    // verificar si existe controlador
    if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
      $this->controller = ucwords($url[0]);
      unset($url[0]);
    }
    // requerir el archivo e instanciar la clase
    require_once '../app/controllers/' . $this->controller . '.php';
    $this->controller = new $this->controller;

    // verificar por segundo parametro en la url
    if (isset($url[1])) {
      // verificar si existe el metodo
      if (method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }
    }
    $this->params = $url ? array_values($url) : [];
    // llamar al metodo con los parametros
    call_user_func([$this->controller, $this->method], $this->params);
  }

  public function getUrl()
  {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      return explode('/', $url);
    }
  }
}
