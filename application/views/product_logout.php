<?php include 'lib/header.php'?>

<div class="header">
  <a href="<?= base_url('shop/index')?>" class="headerWord">商品</a> 
  <a href="<?= base_url('car/index')?>" class="headerWord">購物車</a>
  <a href="<?= base_url('history/index')?>" class="headerUser">購買紀錄</a>       
  <a href="<?= base_url('product/logout')?>" class="headerWord">登出</a>
  <a href="<?= base_url('myHome/index')?>" class="myProfileLink">
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

<div class="noticeTable">
  <div class="noticeTitle">訊息</div>
  <p class="logoutWord">確定登出？</p>
  <a href="<?= base_url('product/doLogout')?>" class="logoutYes">登出</a>
  <a href="<?= base_url('shop/index')?>" class="logoutNo">取消</a>
</div>

<?php include 'lib/footer.php'?>
