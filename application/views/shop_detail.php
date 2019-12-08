<?php include 'lib/header.php'?>
<div class="header">
  <a href="<?= base_url('index.php/shop/index')?>" class="headerWord">商品</a> 
  <a href="<?= base_url('index.php/car/index')?>" class="headerWord">購物車</a>   
  <a href="<?= base_url('')?>" class="headerWord">登出</a>   
</div>
<div class="productDetailTable">
  <img src="<?= base_url('upload/' . $query->path)?>" class="pictureDetail">
  <p class="detailWord">商品編號：<?= $query->id?></p>
  <p class="detailWord">品名：<?= $query->name?></p>
  <p class="detailWord">價格：<?= $query->price?></p>
  <p class="detailWordPurche">購買數量：</p>
  <form action="<?= base_url('index.php/car/insert')?>" method="post">
    <select name="count" class="countTable">
      <?php for ($i = 1; $i < 11; $i++) { ?>
      <option value="<?= $i?>"><?= $i?></option>
      <?php }?>
    </select>
    <input type="hidden" name="id" value="<?= $query->id?>">
    <input type="hidden" name="name" value="<?= $query->name?>">
    <input type="hidden" name="price" value="<?= $query->price?>">
    <input type="hidden" name="path" value="<?= $query->path?>">
    <button type="submit" class="detailButton">送出</button>
  </form>
  <a href="<?= base_url('index.php/shop/index')?>" class="backHome">返回商品欄</a>
</div>
<?php include 'lib/footer.php'?>
