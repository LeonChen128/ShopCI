<?php

class MyHome extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('myHome_model');
  }

  public function index() {
    if (!isset($_SESSION['user'])) {
      redirect(base_url('index.php/product/index'));
      return true;
    }
    $this->load->view('myHome_index');
  }

  public function resetPhoto() {
    if (!isset($_SESSION['user'])) {
      redirect(base_url('index.php/product/index'));
      return true;
    }

    if (!is_uploaded_file($_FILES['file']['tmp_name'])) {
      redirect(base_url('index.php/shop/index'));
      return true;
    }
    $tmp_name = $_FILES['file']['tmp_name'];
    $id = $_SESSION['user']['id'];
    if (!$this->myHome_model->resetPhoto($id, $tmp_name)) {
      echo '圖片上傳失敗';
      header('Refresh: 3 url=' . base_url('index.php/myHome/index'));
      return true;
    } else {
      $query = $this->myHome_model->getUserData($id); 
      $_SESSION['user'] = [
        'id'   => $query->id,
        'name' => $query->name,
        'path' => $query->path
      ];

      echo '圖片修改成功';
      header('Refresh: 3 url=' . base_url('index.php/myHome/index'));
      return true;
    }
  }

  public function resetName() {
    if (!isset($_SESSION['user'])) {
      redirect(base_url('index.php/product/index'));
      return true;
    }
    
    if (!$this->input->post()) {
      redirect(base_url('index.php/shop/index'));
      return true;
    }

    $name = trim($_POST['name']);
    $id   = $_SESSION['user']['id'];

    if (mb_strlen($name) > 10) {
      echo '名稱字數須小於10，請更換！';
      header('Refresh: 3 url=' . base_url('index.php/myHome/index'));
      return true;
    }

    if ($this->myHome_model->confirmName($name)) {
      echo '名稱已存在，請更換！';
      header('Refresh: 3 url=' . base_url('index.php/myHome/index'));
      return true;
    }

    if (!$query = $this->myHome_model->resetName($name, $id)) {
      echo '名稱修改失敗！';
      header('Refresh: 3 url=' . base_url('index.php/myHome/index'));
      return true;
    } else {
      $_SESSION['user'] = [
        'id'   => $query->id,
        'name' => $query->name,
        'path' => $query->path
      ];
      echo '名稱修改成功！';
      header('Refresh: 3 url=' . base_url('index.php/myHome/index'));
      return true;
    }
  }

  public function password() {
    if (!isset($_SESSION['user'])) {
      redirect(base_url('index.php/product/index'));
      return true;
    }
    $this->load->view('myHome_password');    
  }

  public function resetPassword() {
    if (!isset($_SESSION['user'])) {
      redirect(base_url('index.php/product/index'));
      return true;
    }

    if (!$this->input->post()) {
      redirect(base_url('index.php/shop/index'));
      return true;
    }

    $id = $_SESSION['user']['id'];
    $oldPassword = trim($_POST['oldPassword']);
    $newPassword = trim($_POST['newPassword']);
    $rePassword  = trim($_POST['rePassword']);

    if ($oldPassword == '') {
      echo '舊密碼欄位不可為空白！';
      header('Refresh: 3 url=' . base_url('index.php/myHome/password'));
      return true;
    }

    if ($newPassword == '') {
      echo '新密碼欄位不可為空白！';
      header('Refresh: 3 url=' . base_url('index.php/myHome/password'));
      return true;
    }

    if (!$this->myHome_model->confirmPassword($id, $oldPassword)) {
      echo '您的密碼輸入錯誤，請重新確認！';
      header('Refresh: 3 url=' . base_url('index.php/myHome/password'));
      return true;
    }

    if (mb_strlen($newPassword) > 12) {
      echo '密碼字數須小於12，請重新確認！';
      header('Refresh: 3 url=' . base_url('index.php/myHome/password'));
      return true;
    }

    if ($newPassword != $rePassword) {
      echo '新密碼確認錯誤，請重新輸入！';
      header('Refresh: 3 url=' . base_url('index.php/myHome/password'));
      return true;
    }

    if ($this->myHome_model->resetPassword($id, $newPassword)) {
      echo '密碼修改成功！';
      header('Refresh: 3 url=' . base_url('index.php/myHome/password'));
      return true;
    }
  }
}