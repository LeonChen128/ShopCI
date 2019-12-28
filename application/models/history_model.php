<?php

class History_model extends CI_Model {
  
  public function __construct() {
    parent::__construct();
    session_start();
  }

  public function getUserOrder($userName) {
    $query = $this->db->query('SELECT * FROM `order` WHERE user = "' . $userName . '"');
    return $query->result();   
  }

  public function getOrderHistory($id) {
    $query = $this->db->query('SELECT * FROM `order_detail`, `product` WHERE `order_id` ="' . $id . '" AND `product_id` = product.id');
    return $query->result();
  }
}