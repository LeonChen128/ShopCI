<?php include 'lib/header.php'?>

<div class="header">
  <a href="<?= base_url('index.php/shop/index')?>" class="headerWord">商品</a> 
  <a href="<?= base_url('index.php/car/index')?>" class="headerWord">購物車</a>
  <a href="<?= base_url('index.php/profile/index')?>" class="headerUser">
    <?= $_SESSION['user']['name']?>
  </a>    
  <a href="<?= base_url('index.php/product/logout')?>" class="headerWord">登出</a>  
</div>

<div class="searchTable">
  <form action="<?= base_url('index.php/shop/index')?>" method="post" class="searchForm">
    <input type="text" name="search" value="<?= isset($_POST['search']) ? trim($_POST['search']) : ''?>" placeholder="收尋商品關鍵字" class="searchInput">
    <button type="submit" class="searchButton">收尋</button>
  </form>  
</div>


<div class="productTable">
  <?php
  if ($query) {
    echo $load->view('shop/a', ['query' => $query], true);
  } else { 
    echo $load->view('shop/b', [], true);
  }
  ?>  
</div>

<?php include 'lib/footer.php';
