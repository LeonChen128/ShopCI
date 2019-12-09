<?php include 'lib/header.php'?>
<div class="header">
  <a href="<?= base_url('index.php/shop/index')?>" class="headerWord">商品</a> 
  <a href="<?= base_url('index.php/car/index')?>" class="headerWord">購物車</a>   
  <a href="<?= base_url('index.php/product/logout')?>" class="headerWord">登出</a>   
</div>
<div class="productTable">
  <?php foreach ($query as $products):?>
    <a href="<?= base_url('index.php/shop/detail?id=' . $products->id)?>" class="linkWord">
      <div class="productFrame">
        <img src="<?= base_url('upload/' . $products->path)?>" class="productPicture">
        <p class="productWord">編號：<?= $products->id?></p><br>
        <p class="productWord">名稱：<?= $products->name?></p><br>
        <p class="productWord">價格：<?= $products->price?></p>
      </div>
    </a>
  <?php endforeach?>  
</div>
<?php include 'lib/footer.php'?>