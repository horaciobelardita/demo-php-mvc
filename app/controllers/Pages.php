<?php

class Pages extends Controller
{
  public function __construct()
  { }
  public function index()
  {
    $title = 'Welcome';
    $this->view('pages/index', ['title' => $title]);
  }
  public function about($id)
  {
    var_dump($id);
  }
}
