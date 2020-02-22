<?php include 'lib/header.php'?>

<div class="header">
  <a href="<?= base_url('/shop/index')?>" class="headerWord">商品</a> 
  <a href="<?= base_url('/car/index')?>" class="headerWord">購物車</a>
  <a href="<?= base_url('/history/index')?>" class="headerUser">購買紀錄</a>    
  <a href="<?= base_url('/product/logout')?>" class="headerWord">登出</a> 
  <a href="<?= base_url('/myHome/index')?>" class="myProfileLink">
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

<p class="carTitleWord">購物車</p>

<div class="carProductTitle">
  <spanl class="carProductTitleWord1">商品</spanl>
  <spanl class="carProductTitleWord2">商品編號</spanl>
  <spanl class="carProductTitleWord3">商品名稱</spanl>
  <spanl class="carProductTitleWord4">商品價格</spanl>
  <spanl class="carProductTitleWord5">商品數量</spanl>
  <spanl class="carProductTitleWord6">小計</spanl>
  <spanl class="carProductTitleWord7">操作</spanl>
</div>

<?php
$total = 0;
foreach ($_SESSION['car'] as $id => $products):
  $subtotal = $products['count'] * $products['price'];
  $total += $subtotal; ?>
  <div class="carProductcontent">
    <a href="<?= base_url('/shop/detail?id=' . $id)?>">
      <img src="<?= base_url('upload/' . $products['path'])?>" class="carPicture">
    </a>
    <spanl class="contentWord1"><?= $id?></spanl>
    <spanl class="contentWord2"><?= $products['name']?></spanl>
    <spanl class="contentWord3"><?= $products['price']?></spanl>
    <spanl class="contentWord4"><?= $products['count']?></spanl>
    <spanl class="contentWord5"><?= $products['count'] * $products['price']?></spanl>
    <form action="<?= base_url('/car/index')?>" method="post" class="clearForm">
      <input type="hidden" name="clear" value="<?= $id?>">
      <button type="submit" class="clearButton">清除</button>
    </form>
  </div>
<?php endforeach ?>

<div class="carProductPurchase">
  <spanl class="carProductPurchaseWord1">總金額：</spanl>  
  <spanl class="carProductPurchaseWord2">$<?= $total?></spanl> 
  <form action="<?= base_url('/car/order')?>" method="post" class="orderForm">
    <input type="hidden" name="order" value="yes">
    <button type="submit" class="orderButton">確定下單</button>
  </form>
</div>

<?php include 'lib/footer.php'?>
