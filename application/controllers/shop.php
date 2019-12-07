<?php

class Shop extends CI_Controller {
  
  public function __construct() {
    parent::__construct();
    $this->load->model('shop_model');
  }

  public function index() {
    if (!isset($_SESSION['user'])) {
      $this->load->view('product_index');
      return true;
    }
    $query = $this->shop_model->getAllProduct();
    $this->load->view('shop_index', [
      'query' => $query
    ]);
  }
}