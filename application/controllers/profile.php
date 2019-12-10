<?php

class Profile extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('profile_model');
  }

  public function index() {
    if (!isset($_SESSION['user'])) {
      header('Location:' . base_url('index.php/product/index'));
      return true;
    }
    $query  = $this->profile_model->getUserById($_SESSION['user']['id']);
    $orders = $this->profile_model->getUserOrder();
    $historys = [];
    foreach ($orders as $key => $value) {
      $historys[] = $this->profile_model->getOrderHistory($value->id);   
    }
    $this->load->view('profile_index', [
      'query' => $query,
      'historys' =>$historys
    ]);
  }
}