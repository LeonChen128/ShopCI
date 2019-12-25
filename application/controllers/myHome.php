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

    if (!$this->myHome_model->resetPhoto($_FILES['file']['tmp_name'])) {
      echo '圖片上傳失敗';
      header('Refresh: 3 url=' . base_url('index.php/myHome/index'));
      return true;
    } else {
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
}