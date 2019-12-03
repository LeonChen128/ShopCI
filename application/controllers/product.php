<?php

class Product extends CI_Controller {

  public function index() {
    $this->load->view('product_index');
  }

  public function login() {
    $this->load->view('product_login');
  }

  public function register() {
    $this->load->view('product_register');
  }
}