<?php

class Car_model extends CI_Model {

  public function __construct() {
    parent::__construct();
    session_start();
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