<?php include 'lib/header.php'?>

<div class="header">
  <a href="<?= base_url('index.php/shop/index')?>" class="headerWord">商品</a> 
  <a href="<?= base_url('index.php/car/index')?>" class="headerWord">購物車</a>
  <a href="<?= base_url('index.php/profile/index')?>" class="headerUser">購買紀錄</a>       
  <a href="<?= base_url('index.php/product/logout')?>" class="headerWord">登出</a>
  <a href="<?= base_url('index.php/myHome/index')?>" class="myProfileLink">
    <spanl class="myName"><?= $_SESSION['user']['name']?></spanl>
    <img src="<?= base_url('userupload/' . $_SESSION['user']['path'])?>" class="myProfile">
  </a>  
</div>

<div class="noticeTable">
  <div class="noticeTitle">訊息</div>
  <p class="logoutWord">確定登出？</p>
  <a href="<?= base_url('index.php/product/doLogout')?>" class="logoutYes">登出</a>
  <a href="<?= base_url('index.php/shop/index')?>" class="logoutNo">取消</a>
</div>

<?php include 'lib/footer.php'?>
