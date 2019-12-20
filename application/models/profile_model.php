<?php

class Profile_model extends CI_Model {
  
  public function __construct() {
    parent::__construct();
    session_start();
  }

  public function getUserById($id) {
    $query = $this->db->get_where('user', [
      'id' => $id
    ]);
    return $query->row();
  }

  public function getUserOrder() {
    if (!isset($_SESSION['user'])) {
      return true;
    }
    $query = $this->db->query('SELECT * FROM `order` WHERE user = "' . $_SESSION['user']['name'] . '"');
    return $query->result();   
  }

  public function getOrderHistory($id) {
    $query = $this->db->query('SELECT * FROM `order_detail`, `product` WHERE `order_id` ="' . $id . '" AND `product_id` = product.id');
    return $query->result();
  }
}