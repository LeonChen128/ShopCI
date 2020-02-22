<?php 
  foreach ($query as $products) { ?>
    <a href="<?= base_url('shop/detail?id=' . $products->id)?>" class="linkWord">
      <div class="productFrame">
        <img src="<?= base_url('upload/' . $products->path)?>" class="productPicture">
        <p class="productWord">編號：<?= $products->id?></p><br>
        <p class="productWord">名稱：<?= $products->name?></p><br>
        <p class="productWord">價格：<?= $products->price?></p>
      </div>
    </a>
<?php
  }