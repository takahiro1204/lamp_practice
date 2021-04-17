<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <?php include VIEW_PATH . 'template/head.php'; ?>
        <title>明細履歴</title>
        <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'cart.css'); ?>">
    </head>
    <body>
    <?php include VIEW_PATH.'template/cart.php'; ?>
    <h1>明細履歴</h1>
    <div class="container">
      <?php include VIEW_PATH . 'templates/messages.php'; ?>
      <?php if(count($details) > 0) { ?>
         <table class="table table-bordered">
         <thead class="thead-light">
        <table>
            <thead>
                <tr>
                    <th>商品名</th>
                    <th>価格</th>
                    <th>購入数</th>
                    <th>合計</th>
                </tr>
            </thead>
       </table> 
     <?php foreach($details as $detail) { ?>
        <tr>
          <?php print(h($detail['name'])); ?>
          <?php print(h($detail['price'])); ?>
          <?php print(h($detail['amount'])); ?>
          <?php print(h($detail['total'])); ?>
        </tr>
    <?php } ?>
     <?php } ?>
    </body>
</html>