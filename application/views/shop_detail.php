<?php include 'lib/header.php'?>

<script src="<?= base_url('lib/shop_detail.js')?>"></script>

<div class="header">
  <a href="<?= base_url('index.php/shop/index')?>" class="headerWord">商品</a> 
  <a href="<?= base_url('index.php/car/index')?>" class="headerWord">購物車</a>
  <a href="<?= base_url('index.php/profile/index')?>" class="headerUser">購買紀錄</a>       
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
    <button type="submit" class="detailButton">加入購物車</button>
  </form>
  <a href="<?= base_url('index.php/shop/index')?>" class="backHome">返回商品欄</a>
</div>

<div class="messageTable">
  <div class="messageFrame">
    <form action="<?= base_url('index.php/shop/doMessage')?>" method="post">
      <input type="hidden" name="product_id" value="<?= $query->id?>">
      <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id']?>">
      <textarea name="message" class="messageInput" placeholder="輸入您的留言..." id="message"></textarea>
      <button type="submit" class="doMessageButton" onclick="return checkMessage()">送出</button>
      <button type="reset" class="messageClearButton">清除</button>
    </form>  
  </div>

  <hr>
  <?php
  if ($messages == []) { ?>
    <p class="noMessage">尚無留言</p>
  <?php
  } else {
    foreach ($messages as $aaa) { ?>
      <div class="messageShow">
        <?php
        if ($aaa->path == '') { ?>
          <img src="<?= base_url('userUpload/0.jpg')?>" class="messageUserProfile"> 
        <?php 
        } else { ?>
          <img src="<?= base_url('userUpload/'. $aaa->path)?>" class="messageUserProfile"> 
        <?php } ?>
        <div class="messageContent"><spanl class="userName"><?= $aaa->name?>：</spanl><?= $aaa->message?></div>       
      </div>
  <?php    
    }
  } ?>
</div>

<?php include 'lib/footer.php'?>
