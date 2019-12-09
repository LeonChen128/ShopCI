<?php

class Car extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('car_model');
  }

  public function index() {
    if (!isset($_SESSION['car'])) {
      $this->load->view('car_nothing');
      return true;
    }

    if (isset($_POST['clear'])) {
      unset($_SESSION['car'][$_POST['clear']]);
    }
    
    if ($_SESSION['car'] == []) {
      $this->load->view('car_nothing');
      return true;
    }
    $this->load->view('car_product');
  }

  public function insert() {
    if (!$this->input->post()) {
      header('Location:' . base_url('index.php/shop/index'));
      return true;
    }
    $this->car_model->insertCar();
    $this->load->view('car_product');
  }

  public function order() {
    if (!isset($_POST['order'])) {
      header('Location:' . base_url('index.php/shop/index'));
      return true;
    }
    
    if (!isset($_SESSION['car'])) {
      $this->load->view('car_nothing');
      return true;
    }

    if ($_SESSION['car'] == []) {
      $this->load->view('car_nothing');
      return true;
    }
    
    $data = ['user' => $_SESSION['user']['name']];
    if (! $orderId = $this->car_model->insertOrder($data)) {
      echo '下單失敗';
      header('Refresh: 3 url=' . base_url('index.php/shop/index'));
      return true;
    }

    foreach ($_SESSION['car'] as $id => $products) {
      $data = [
        'order_id'   => $orderId,
        'product_id' => $id,
        'count'      => $products['count']
      ];
      if (!$this->car_model->insertOrderDetail($data)) {
        echo '下單失敗';
        header('Refresh: 3 url=' . base_url('index.php/shop/index'));
        return true;
      }
    }
    unset($_SESSION['car']);
    echo '下單成功！';
    header('Refresh: 3 url=' . base_url('index.php/shop/index'));
    return true;
  }
}