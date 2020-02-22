<?php include 'lib/header.php'?>

<script src="<?= base_url('lib/product_login.js')?>"></script>

<div class="header">
  <a href="<?= base_url('product/index')?>" class="headerWord">首頁</a> 
  <a href="<?= base_url('product/login')?>" class="headerWord">登入</a>  
  <a href="<?= base_url('product/register')?>" class="headerWord">註冊</a>   
</div>

<div class="loginTable">
  <h1 class="memberLogin">會員登入</h1>
  <div>
    <form action="<?= base_url('product/checkLogin')?>" method="post">
      <input type="text" name="account" placeholder="輸入帳號.." class="inputTable" id="account">
      <input type="password" name="password" placeholder="輸入密碼.." class="inputTable" id="password">
      <button type="submit" class="sumitButton" onclick="return checkLogin()"><spanl class="sumitButtonWord">登入</spanl></button>
      <button type="reset" class="resetButton">修正</button>
  </div>
  <spanl class="memberNotYet">還不是會員？</spanl>
  <a href="<?= base_url('product/register')?>" class="joinMember">加入會員</a>
</div>

<?php include 'lib/footer.php'?>
