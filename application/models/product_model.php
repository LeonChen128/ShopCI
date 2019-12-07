<?php

class product_model extends CI_Model {
  protected $table      = 'user';
  protected $primaryKey = 'id';

  function __construct() {
    parent::__construct();
    session_start();
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