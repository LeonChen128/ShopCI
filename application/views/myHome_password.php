<?php include 'lib/header.php'?>

<script src="<?= base_url('lib/myHome_password.js')?>"></script>

<div class="header">
  <a href="<?= base_url('index.php/shop/index')?>" class="headerWord">商品</a> 
  <a href="<?= base_url('index.php/car/index')?>" class="headerWord">購物車</a>
  <a href="<?= base_url('index.php/history/index')?>" class="headerUser">購買紀錄</a>       
  <a href="<?= base_url('index.php/product/logout')?>" class="headerWord">登出</a> 
  <a href="<?= base_url('index.php/myHome/index')?>" class="myProfileLink">
    <spanl class="myName"><?= $_SESSION['user']['name']?></spanl>
    <?php 
    if ($_SESSION['user']['path'] == '') { ?>
      <img src="<?= base_url('userupload/0.jpg')?>" class="myProfile">
    <?php
    } else { ?>
      <img src="<?= base_url('userupload/' . $_SESSION['user']['path'])?>" class="myProfile">
    <?php } ?>
  </a>
</div>

<div class="myHomeSelectTable">
  <?php 
    if ($_SESSION['user']['path'] == '') { ?>
      <img src="<?= base_url('userupload/0.jpg')?>" class="myHomeSelectPhoto">
    <?php
    } else { ?>
      <img src="<?= base_url('userupload/' . $_SESSION['user']['path'])?>" class="myHomeSelectPhoto">
    <?php } ?>
    
  <spanl class="myHomeSelectTitleWord">我的帳戶</spanl>
  <br>

  <a href="<?= base_url('index.php/myHome/index')?>" class="dataReset">
    <p class="myDataReset">資料修改</p>
  </a>

  <a href="<?= base_url('index.php/myHome/password')?>" class="dataReset">
    <p class="myPasswordResetNow">密碼修改</p>
  </a>
</div>

<div class="myHomeTable">
  <p class="myHomeTitle">我的檔案</p>
  <hr class="myHomeHr">

  <form action="<?= base_url('index.php/myHome/resetPassword')?>" method="post" class="passwordTable">
    <spanl class="myPasswordWord1">現在的密碼</spanl>
    <input type="password" name="oldPassword" class="myPasswordInput" id="oldPassword">
    <br>
    <spanl class="myPasswordWord2">新的密碼</spanl>
    <input type="password" name="newPassword" class="myPasswordInput" id="newPassword">
    <br>
    <spanl class="myPasswordWord3">確認的密碼</spanl>
    <input type="password" name="rePassword" class="myPasswordInput" id="rePassword">
    <br>
    <button type="submit" class="resetPasswordButton" onclick="return ckeckResetPassword()">確認</button>
  </form>

</div>

<?php include 'lib/footer.php'?>