<?php

class Controller
{
  // cargar un modelo
  public function model($model)
  {
    require_once '../app/models/' . $model . '.php';
    return new $model;
  }
  //  cargar una vista
  public function view($view, $data = [])
  {
    // verificar si existe el archivo view
    if (file_exists('../app/views/' . $view . '.php')) {
      extract($data);
      require_once '../app/views/' . $view . '.php';
    } else {
      die('la vista no existe');
    }
  }
}
