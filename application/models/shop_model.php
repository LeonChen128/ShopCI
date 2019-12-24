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

  public function searchKeyWord($key) {
    $query = $this->db->query('SELECT * FROM product WHERE name like "%' . $key . '%"');
    return $query->result();
  }

  public function insertMessage($data) {
    $this->db->insert('product_message', $data);
    return $this->db->insert_id();
  }

  public function getMessageAndUser($id) {
    $query = $this->db->query('SELECT * FROM product_message, user WHERE product_id ="' . $id . '" AND user_id = user.id ORDER BY product_message.id asc');
    return $query->result();
  }

}


