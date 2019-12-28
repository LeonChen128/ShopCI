<?php include 'lib/header.php'?>

<script src="<?= base_url('lib/myHome_index.js')?>"></script>

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

<div class="myHomeSelectTable">
  <?php 
    if ($_SESSION['user']['path'] == '') { ?>
      <img src="<?= base_url('userupload/0.jpg')?>" class="myHomeSelectPhoto">
    <?php
    } else { ?>
      <img src="<?= base_url('userupload/' . $_SESSION['user']['path'])?>" class="myHomeSelectPhoto">
    <?php } ?>
    
  <spanl class="myHomeSelectTitleWord">我的帳戶</spanl>
  <br>

  <a href="<?= base_url('index.php/myHome/index')?>" class="dataReset">
    <p class="myDataResetNow">資料修改</p>
  </a>

  <a href="<?= base_url('index.php/myHome/password')?>" class="dataReset">
    <p class="myPasswordReset">密碼修改</p>
  </a>
</div>

<div class="myHomeTable">
  <p class="myHomeTitle">我的檔案</p>
  <hr class="myHomeHr">

  <form action="<?= base_url('index.php/myHome/resetPhoto')?>" method="post" enctype="multipart/form-data">
    <spanl class="myHomeProfile">頭像</spanl>
    <?php 
    if ($_SESSION['user']['path'] == '') { ?>
      <img src="<?= base_url('userupload/0.jpg')?>" class="myHomeProfileImg">
    <?php
    } else { ?>
      <img src="<?= base_url('userupload/' . $_SESSION['user']['path'])?>" class="myHomeProfileImg">
    <?php } ?>
    <button class="myHomeProfileButton" onclick="return checkFile()">確認</button>
    <label type="button" class="upload">
      <spanl class=>
        <?php
        if ($_SESSION['user']['path'] == '') {
          echo '新增頭像';
        } else {
          echo '修改頭像';
        }
        ?>        
      </spanl>
      <input type="file" name="file" id="uploadFile">
    </label>
  </form>

  <form action="<?= base_url('index.php/myHome/resetName')?>" method="post" class="myHomeFormTable2">
    <spanl class="myHomeName">名稱</spanl><input type="text" name="name" value="<?= $_SESSION['user']['name']?>" class="myHomeNameInput">
    <button class="myHomeNameButton">確認</button>
  </form>

</div>

<?php include 'lib/footer.php'?>