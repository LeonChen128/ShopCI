<?php

class Product extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('product_model');
  }

  public function index() {
    $this->load->view('product_index');
  }

  public function login() {
    $this->load->view('product_login');
  }

  public function checkLogin() {
    if (!$this->input->post()) {
      $this->load->view('product_login');
      return true;
    }
    $data = $this->input->post();

    if ($user = $this->product_model->checkLogin($data)) {
      unset($_SESSION['user']);
      $_SESSION['user'] = [
        'id' => $user->id,
        'name' => $user->name
      ];
      echo '歡迎回來，' . $_SESSION['user']['name'];
      header('Refresh:3 url=' . base_url('/index.php/shop/index'));
    } else {
      echo '帳號密碼錯誤';
      header('Refresh:3 url=' . base_url('/index.php/product/login'));
    }
  }

  public function register() {
    $this->load->view('product_register');
  }

  public function registerUser() {
    if (!$this->input->post()) {
      $this->load->view('product_register');
      return true;
    }

    $name       = trim($this->input->post('name'));
    $account    = trim($this->input->post('account'));
    $password   = trim($this->input->post('password'));
    $repassword = trim($this->input->post('repassword'));

    if (mb_strlen($name) > 10) {
      echo '名字字數須小於10。';
      return true;
    }

    if (mb_strlen($account) > 12) {
      echo '帳號字數須小於12。';
      return true;
    }

    if (mb_strlen($password) > 12) {
      echo '密碼字數須小於12。';
      return true;
    }

    if ($name == '' || $account == '' || $password == '') {
      echo '欄位不可空白。';
      return true;
    }

    if ($password != $repassword) {
      echo '密碼確認錯誤。';
      return true;
    }

    $data = $this->input->post();
    array_pop($data);
    if ($this->product_model->insertUserData($data)) {
      echo '註冊成功！';
    } else {
      echo '註冊失敗。';
    }
  }
}