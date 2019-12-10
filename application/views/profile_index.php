<?php include 'lib/header.php'?>
<div class="header">
  <a href="<?= base_url('index.php/shop/index')?>" class="headerWord">商品</a> 
  <a href="<?= base_url('index.php/car/index')?>" class="headerWord">購物車</a>
  <a href="<?= base_url('index.php/profile/index')?>" class="headerUser">
    <?= $_SESSION['user']['name']?>
  </a>    
  <a href="<?= base_url('index.php/product/logout')?>" class="headerWord">登出</a>  
</div>
<div class="profileTable">
  <p class="profileTitleWord">使用者資料</p>
  <p class="profileinnerWord">名稱：<?= $query->name?></p>
  <p class="profileinnerWord">帳號：<?= $query->account?></p>
</div>
<div class="buyHistory">
  <p class="HistorytitleWord">購買紀錄</p>
  <?php foreach($historys as $aaa => $bbb):?>
    <?php $total = 0?>
    <table rules="all" class="historyTable">
      <tr>
        <th>商品名稱</th>
        <th>商品數量</th>
        <th>商品價格</th>
        <th>小計</th>
      </tr>
      <?php foreach($bbb as $key => $value):?>
        <tr>
          <td><?= $value->name?></td>
          <td><?= $value->count?></td>
          <td><?= $value->price?></td>
          <td><?= $value->price * $value->count?></td>
          <?php $subtotal = $value->price * $value->count?>
          <?php $total += $subtotal?>
        </tr>
      <?php endforeach?>
      <tr>
        <td></td>
        <td></td>
        <td>總計</td>
        <td><?= $total?></td>
      </tr>     
    </table>
  <?php endforeach?>
</div>
<?php include 'lib/footer.php'?>
