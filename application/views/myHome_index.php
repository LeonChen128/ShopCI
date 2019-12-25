<?php include 'lib/header.php'?>

<script src="<?= base_url('lib/myHome_index.js')?>"></script>

<div class="header">
  <a href="<?= base_url('index.php/shop/index')?>" class="headerWord">商品</a> 
  <a href="<?= base_url('index.php/car/index')?>" class="headerWord">購物車</a>
  <a href="<?= base_url('index.php/profile/index')?>" class="headerUser">購買紀錄</a>       
  <a href="<?= base_url('index.php/product/logout')?>" class="headerWord">登出</a> 
  <a href="<?= base_url('index.php/myHome/index')?>" class="myProfileLink">
    <spanl class="myName"><?= $_SESSION['user']['name']?></spanl>
    <img src="<?= base_url('userupload/' . $_SESSION['user']['path'])?>" class="myProfile">
  </a>
</div>

<div class="myHomeTable">
  <p class="myHomeTitle">我的檔案</p>
  <hr class="myHomeHr">

  <form action="<?= base_url('index.php/myHome/resetPhoto')?>" method="post" enctype="multipart/form-data">
    <spanl class="myHomeProfile">頭像</spanl>
    <img src="<?= base_url('userupload/' . $_SESSION['user']['path'])?>" class="myHomeProfileImg">
    <button class="myHomeProfileButton" onclick="return checkFile()">確認</button>
    <label type="button" class="upload">
      <spanl class=>修改頭像</spanl>
      <input type="file" name="file" id="uploadFile">
    </label>
  </form>

  <form action="<?= base_url('index.php/myHome/resetName')?>" method="post" class="myHomeFormTable2">
    <spanl class="myHomeName">名稱</spanl><input type="text" name="name" value="<?= $_SESSION['user']['name']?>" class="myHomeNameInput">
    <button class="myHomeNameButton">修改名稱</button>
  </form>

</div>

<?php include 'lib/footer.php'?>