<?php

class Product extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('product_model');
  }

  public function index() {

    if ($this->input->post()) {
      $search = $_POST['search'];
      $query = $this->product_model->searchProducts($search);
      $this->load->view('product_index', [
      'query' => $query
      ]);
      return true;
    }

    $query = $this->product_model->getAllProduct();
    $this->load->view('product_index', [
      'query' => $query
    ]);
    return true;
  }

  public function login() {
    $this->load->view('product_login');
    return true;
  }

  public function checkLogin() {
    if (!$this->input->post()) {
      redirect(base_url('product/login'));
      return true;
    }
    $data = $this->input->post();

    if ($user = $this->product_model->checkLogin($data)) {
      unset($_SESSION['user']);
      $_SESSION['user'] = [
        'id'   => $user->id,
        'name' => $user->name,
        'path' => $user->path
      ];
      echo '歡迎回來，' . $_SESSION['user']['name'];
      header('Refresh:3 url=' . base_url('/index.php/shop/index'));
      return true;
    } else {
      echo '帳號密碼錯誤';
      header('Refresh:3 url=' . base_url('/index.php/product/login'));
      return true;
    }
  }

  public function register() {
    $this->load->view('product_register');
    return true;
  }

  public function registerUser() {
    if (!$this->input->post()) {
      redirect(base_url('product/register'));
      return true;
    }

    $name       = trim($this->input->post('name'));
    $account    = trim($this->input->post('account'));
    $password   = trim($this->input->post('password'));
    $repassword = trim($this->input->post('repassword'));

    if (mb_strlen($name) > 10) {
      echo '名字字數須小於10。';
      header('Refresh:3 url=' . base_url('product/register'));
      return true;
    }

    if (mb_strlen($account) > 12) {
      echo '帳號字數須小於12。';
      header('Refresh:3 url=' . base_url('product/register'));
      return true;
    }

    if (mb_strlen($password) > 12) {
      echo '密碼字數須小於12。';
      header('Refresh:3 url=' . base_url('product/register'));
      return true;
    }

    if ($name == '' || $account == '' || $password == '') {
      echo '欄位不可空白。';
      header('Refresh:3 url=' . base_url('product/register'));
      return true;
    }

    if ($password != $repassword) {
      echo '密碼確認錯誤。';
      header('Refresh:3 url=' . base_url('product/register'));
      return true;
    }

    $data = $this->input->post();
    array_pop($data);

    if ($this->product_model->checkExistedName($data['name'])) {
      echo '名稱已存在，請更換。';
      header('Refresh:3 url=' . base_url('product/register'));
      return true;
    }

    if ($this->product_model->checkExistedAccount($data['account'])) {
      echo '帳號已存在，請更換。';
      header('Refresh:3 url=' . base_url('product/register'));
      return true;
    }

    if ($this->product_model->insertUserData($data)) {
      echo '註冊成功！';
      header('Refresh:3 url=' . base_url('product/login'));
      return true;
    } else {
      echo '註冊失敗。';
      header('Refresh:3 url=' . base_url('product/login'));
      return true;
    }
  }

  public function logout() {
    $this->load->view('product_logout');
    return true;
  }

  public function doLogout() {
    unset($_SESSION['user']);
    redirect(base_url('product/index'));
    return true;
  }

  public function ajaxCheckName() {
    header('Content-Type: application/json; charset=UTF-8');
    $query = $this->product_model->checkExistedNameReturnArray($_POST['name']);
    $result = [
      "name" => $query['name']
    ];
    echo json_encode($result);
    return true;
  }
}