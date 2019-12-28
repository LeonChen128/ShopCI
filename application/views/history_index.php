<?php include 'lib/header.php'?>

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

<p class="buyHistory">購買紀錄</p>

<?php foreach($historys as $aaa => $bbb):?>
  <?php $total = 0?>
  <div class="buyHistoryFrame">
    <?php foreach($bbb as $key => $value):?>
      <div class="eachProductFrame">
        <img src="<?= base_url('upload/' . $value->path)?>" class="eachProductPicture">
        <spanl class="buyHistoryWord1"><?= $value->name?></spanl>
        <spanl class="buyHistoryWord2">$<?= $value->price?></spanl>
        <spanl class="buyHistoryWord3">X<?= $value->count?></spanl>
        <spanl class="buyHistoryWord4">$<?= $value->price * $value->count?></spanl>
        <?php $subtotal = $value->price * $value->count?>
        <?php $total += $subtotal?>
      </div> 
      <hr class="buyHistoryHr"> 
    <?php endforeach?>
    <div class="buyHistoryTotalFrame">
      <spanl class="buyHistoryTotal1">總計：</spanl>
      <spanl class="buyHistoryTotal2">$<?= $total?></spanl> 
    </div>    
  </div>
<?php endforeach?>

<?php include 'lib/footer.php'?>
