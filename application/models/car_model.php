<?php

class Car_model extends CI_Model {

  public function __construct() {
    parent::__construct();
    session_start();
  }

  public function insertCar() {
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
    return $_SESSION['car'];
  }

  public function insertOrder($data) {
    $this->db->insert('order', $data);
    return $this->db->insert_id(); //回傳insert進去的primaryKey
  }

  public function insertOrderDetail($data) {
    $this->db->insert('order_detail', $data);
    return $this->db->insert_id();
  }
}