<?php

class product_model extends CI_Model {
  protected $table      = 'user';
  protected $primaryKey = 'id';

  function __construct() {
    parent::__construct();
    session_start();
  }

  public function getAllProduct() {
    $query = $this->db->get('product');
    return $query->result();
  }

  public function searchProducts($search) {
    $query = $this->db->query('SELECT * FROM product WHERE `name` like "%' . $search . '%"');
    return $query->result();
  }

  public function checkExistedName($name) {
    $query = $this->db->get_where($this->table, [
      'name' => $name
    ]);
    return $query->row();
  }

  public function checkExistedNameReturnArray($name) {
    $query = $this->db->get_where($this->table, [
      'name' => $name
    ]);
    return $query->row_array();
  }

  public function checkExistedAccount($account) {
    $query = $this->db->get_where($this->table, [
      'account' => $account
    ]);
    return $query->row();
  }

  public function insertUserData($data) {
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }

  public function checkLogin($data) {
    $query = $this->db->get_where($this->table, $data);
    return $query->row();
  }
}