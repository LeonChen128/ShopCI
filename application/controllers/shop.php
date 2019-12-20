<?php

class Shop extends CI_Controller {
  
  public function __construct() {
    parent::__construct();
    $this->load->model('shop_model');
  }

  public function index() {
    if (!isset($_SESSION['user'])) {
      header('Location:' . base_url('index.php/product/index'));
      return true;
    }
    if (isset($_POST['search'])) {
      $search = trim($_POST['search']);
      $query = $this->shop_model->searchKeyWord($search);
      $this->load->view('shop_index', [
        'load' => $this->load,
        'query' => $query
      ]);
      return true;
    }
    $query = $this->shop_model->getAllProduct();
    

    $this->load->view('shop_index', [
      'load' => $this->load,
      'query' => $query
    ]);
  }

  public function detail() {
    if (!isset($_GET['id'])) {
      $query = $this->shop_model->getAllProduct();
      $this->load->view('shop_index', [
        'query' => $query
      ]);
      return true;
    }
        
    $query = $this->shop_model->getProduct($_GET['id']);
    $this->load->view('shop_detail', [
      'query' => $query
    ]);
  }
}