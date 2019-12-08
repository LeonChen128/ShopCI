<?php

class Shop_model extends CI_Model {

  public function __construct() {
    parent::__construct();
    session_start();
  }

  public function getAllProduct() {
    $query = $this->db->get('product');
    return $query->result();
  }

  public function getProduct($id) {
    $query = $this->db->get_where('product', [
      'id' => $id
    ]);
    return $query->row();
  }
}