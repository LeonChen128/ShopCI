<?php

class MyHome_model extends CI_Model {

  public function __construct() {
    parent::__construct();
    session_start();
  }

  public function resetPhoto($id, $fileTmpName) {
    $this->db->query('UPDATE user SET `path` ="' . $id . '.jpg" WHERE id =' . $id);

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
    $newPhotoPath = $upload . '/' . $id . '.jpg';
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

  public function getUserData($id) {
    $query = $this->db->get_where('user', [
      'id' => $id
    ]);
    return $query->row();
  }

  public function confirmPassword($id, $oldPassword) {
    $query = $this->db->query('SELECT * FROM user WHERE id =' . $id . ' AND `password` = "' . $oldPassword . '"');
    return $query->row();
  }

  public function resetPassword($id, $newPassword) {
    $query = $this->db->query('UPDATE `user` SET `password` = "' . $newPassword . '" WHERE id = ' . $id);
    $query = $this->db->query('SELECT * FROM `user` WHERE id =' . $id . ' AND `password` = "' . $newPassword . '"');
    return $query->row();
  }
}