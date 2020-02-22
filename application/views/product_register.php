<?php include 'lib/header.php'?>

<script src="<?= base_url('lib/product_register.js')?>"></script>

<div class="header">
  <a href="<?= base_url('product/index')?>" class="headerWord">首頁</a> 
  <a href="<?= base_url('product/login')?>" class="headerWord">登入</a>  
  <a href="<?= base_url('product/register')?>" class="headerWord">註冊</a>   
</div>

<div class="registerTable">
  <h1 class="memberLogin">會員註冊</h1>
  <div>
    <button id="check-name" class="check-name">確認名稱</button>
    <form action="<?= base_url('product/registerUser')?>" method="post">
      <input type="text" name="name" placeholder="輸入字數10以內之名稱.." class="inputTable" id="name">
      <p class="result-name" id="result-name"></p>
      <input type="text" name="account" placeholder="輸入字數12以內之帳號.." class="inputTable" id="account">
      <input type="password" name="password" placeholder="輸入字數12以內之密碼.." class="inputTable" id="password">
      <input type="password" name="repassword" placeholder="再次輸入密碼.." class="inputTable" id="repassword">
      <button type="submit" class="sumitButton" onclick="return checkRegister()"><spanl class="sumitButtonWord">註冊</spanl></button>
      <button type="reset" class="resetButton">修正</button>
  </div>
</div>

<?php include 'lib/footer.php'?>
