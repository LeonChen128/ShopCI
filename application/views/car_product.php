<?php include 'lib/header.php'?>
<div class="header">
  <a href="<?= base_url('index.php/shop/index')?>" class="headerWord">商品</a> 
  <a href="<?= base_url('index.php/car/index')?>" class="headerWord">購物車</a>   
  <a href="<?= base_url('index.php/product/logout')?>" class="headerWord">登出</a>   
</div>
<p class="carTitleWord">購物車內容</p>
<table class="carInternalTable" rules="all">
  <tr>
    <th>商品圖片</th>
    <th>商品編號</th>
    <th>商品名稱</th>
    <th>商品價格</th>
    <th>商品數量</th>
    <th>小計</th>
    <th>動作</th>
  </tr>
  <?php $total = 0?>
  <?php foreach ($_SESSION['car'] as $id => $products):?>
  <?php
  $subtotal = $products['count'] * $products['price'];
  $total += $subtotal;
  ?>  
  <tr>
    <td>
      <a href="<?= base_url('index.php/shop/detail?id=' . $id)?>">
        <img src="<?= base_url('upload/' . $products['path'])?>" class="carPicture">
      </a>
    </td>
    <td><?= $id?></td>
    <td><?= $products['name']?></td>
    <td><?= $products['price']?></td>
    <td><?= $products['count']?></td>
    <td><?= $products['count'] * $products['price']?></td>
    <td>
      <form action="<?= base_url('index.php/car/index')?>" method="post">
        <input type="hidden" name="clear" value="<?= $id?>">
        <button type="submit" class="clearButton">清除</button>
      </form>
    </td>
  </tr> 
  <?php endforeach ?>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>總計</td>
    <td class="totalBackground"><?= $total?></td>
    <td>
      <form action="<?= base_url('index.php/car/order')?>" method="post">
        <input type="hidden" name="order" value="yes">
        <button type="submit" class="orderButton">確定下單</button>
      </form>
    </td>
  </tr>
</table>
<?php include 'lib/footer.php'?>
