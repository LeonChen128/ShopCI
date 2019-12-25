<?php

class MyHome_model extends CI_Model {

  public function __construct() {
    parent::__construct();
    session_start();
  }

  public function resetPhoto($fileTmpName) {
    $thisProjectPath = __file__;
    $path = explode('/', $thisProjectPath);
    array_pop($path);
    array_pop($path);
    array_pop($path);
    $rootPath = implode('/', $path);
    $upload = $rootPath . '/userUpload';

    if (!file_exists($upload)) {
      mkdir($upload);
    }
    $newPhotoPath = $upload . '/' . $_SESSION['user']['id'] . '.jpg';
    return move_uploaded_file($fileTmpName, $newPhotoPath);
  }

  public function confirmName($name) {
    $query = $this->db->query('SELECT * FROM user WHERE name = "' . $name . '"');
    return $query->row();
  }

  public function resetName($name, $id) {
    $this->db->query('UPDATE user SET name = "'. $name . '" WHERE id =' . $id);
    $query = $this->db->query('SELECT * FROM user WHERE name = "' . $name . '"');
    return $query->row();
    
  }
}