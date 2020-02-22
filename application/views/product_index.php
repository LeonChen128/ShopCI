<?php include 'lib/header.php'?>

<div class="header">
  <a href="<?= base_url('product/index')?>" class="headerWord">首頁</a> 
  <a href="<?= base_url('product/login')?>" class="headerWord">登入</a>  
  <a href="<?= base_url('product/register')?>" class="headerWord">註冊</a>  
</div>

<div class="searchTable">
  <form action="<?= base_url('product/index')?>" method="post" class="searchForm">
    <input type="text" name="search" value="<?= isset($_POST['search']) ? trim($_POST['search']) : ''?>" placeholder="收尋商品關鍵字" class="searchInput">
    <button type="submit" class="searchButton">收尋</button>
  </form>  
</div>

<div class="productTable">
  <?php 
  if ($query != []) {
    foreach ($query as $products) { ?>
      <a href="<?= base_url('product/login')?>" class="linkWord">
        <div class="productFrame">
          <img src="<?= base_url('upload/' . $products->path)?>" class="productPicture">
          <p class="productWord">編號：<?= $products->id?></p><br>
          <p class="productWord">名稱：<?= $products->name?></p><br>
          <p class="productWord">價格：<?= $products->price?></p>
        </div>
      </a>
  <?php
    }
  } else { ?>
    <p class="noProduct">查無商品</p>
  <?php } ?>  
</div>

<?php include 'lib/footer.php'?>
