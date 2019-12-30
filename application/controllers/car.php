<?php

class Car extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('car_model');
  }

  public function index() {
    if (!$_SESSION['user']) {
      redirect(base_url('index.php/product/index'));
      return true;
    }

    if (!isset($_SESSION['car'])) {
      $this->load->view('car_nothing');
      return true;
    }

    if (isset($_POST['clear'])) {
      unset($_SESSION['car'][$_POST['clear']]);
      if ($_SESSION['car'] == []) {
        unset($_SESSION['car']);
        $this->load->view('car_nothing');
        return true;
      }
    }
    
    $this->load->view('car_product');
  }

  public function insert() {
    if (!$_SESSION['user']) {
      redirect(base_url('index.php/product/index'));
      return true;
    }

    if (!$this->input->post()) {
      redirect(base_url('index.php/shop/index'));
      return true;
    }
    
    $id    = $_POST['id'];
    $name  = $_POST['name'];
    $price = $_POST['price'];
    $path  = $_POST['path'];

    if (isset($_SESSION['car'][$id]['count'])) {
      $count = $_POST['count'] + $_SESSION['car'][$id]['count'];
    } else {
      $count = $_POST['count'];
    }

    $_SESSION['car'][$id] = [
      'name'  => $name,
      'price' => $price,
      'count' => $count,
      'path'  => $path
    ];

    $this->load->view('car_product');
    return true;
  }

  public function order() {
    if (!$_SESSION['user']) {
      redirect(base_url('index.php/product/index'));
      return true;
    }

    if (!isset($_POST['order'])) {
      redirect(base_url('index.php/shop/index'));
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