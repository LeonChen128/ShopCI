<?php

class Shop extends CI_Controller {
  
  public function __construct() {
    parent::__construct();
    $this->load->model('shop_model');
  }

  public function index() {
    if (!isset($_SESSION['user'])) {
      redirect(base_url('product/index'));
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
    if (!isset($_SESSION['user'])) {
      redirect(base_url('product/index'));
      return true;
    }

    if (!isset($_GET['id'])) {
      redirect(base_url('shop/index'));
      return true;
    }

    if (!is_numeric($_GET['id'])) {
      redirect(base_url('shop/index'));
      return true;
    }
        
    if (!$query = $this->shop_model->getProduct($_GET['id'])) {
      redirect(base_url('shop/index'));
      return true;
    }
    
    $messages = $this->shop_model->getMessageAndUser($_GET['id']);

    $this->load->view('shop_detail', [
      'query'   => $query,
      'messages' => $messages
    ]);
  }

  public function doMessage() {
    if (!isset($_SESSION['user'])) {
      redirect(base_url('product/index'));
      return true;
    }

    if (!$this->input->post()) {
      redirect(base_url('shop/index'));
      return true;
    }

    $data = $this->input->post();
    
    if (!$this->shop_model->insertMessage($data)) {
      echo '留言失敗';
      header('Refresh: 3 url=' . base_url('shop/detail?id=' . $data['product_id']));
      return true;
    } else {
      redirect(base_url('shop/detail?id=' . $data['product_id']));
      return true;
    }
  }

}