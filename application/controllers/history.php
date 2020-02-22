<?php

class History extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('history_model');
  }

  public function index() {
    if (!isset($_SESSION['user'])) {
      redirect(base_url('product/index'));
      return true;
    }

    $userName = $_SESSION['user']['name'];

    $orders = $this->history_model->getUserOrder($userName);
    $historys = [];
    foreach ($orders as $key => $value) {
      $historys[] = $this->history_model->getOrderHistory($value->id);   
    }
    $this->load->view('history_index', [
      'historys' =>$historys
    ]);
  }
}