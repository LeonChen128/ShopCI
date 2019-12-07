<?php include 'lib/header.php'?>
<div class="header">
  <a href="<?= base_url('index.php/product/index')?>" class="headerWord">首頁</a> 
  <a href="<?= base_url('index.php/product/login')?>" class="headerWord">登入</a>  
  <a href="<?= base_url('index.php/product/register')?>" class="headerWord">註冊</a>   
</div>
<div class="registerTable">
  <h1 class="memberLogin">會員註冊</h1>
  <div>
    <form action="<?= base_url('index.php/product/registerUser')?>" method="post">
      <input type="text" name="name" placeholder="輸入名稱.." class="inputTable">
      <input type="text" name="account" placeholder="輸入帳號.." class="inputTable">
      <input type="password" name="password" placeholder="輸入密碼.." class="inputTable">
      <input type="password" name="repassword" placeholder="再次輸入密碼.." class="inputTable">
      <button type="submit" class="sumitButton"><spanl class="sumitButtonWord">註冊</spanl></button>
      <button type="reset" class="resetButton">修正</button>
  </div>
</div>
<?php include 'lib/footer.php'?>
