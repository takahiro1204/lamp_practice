<!DOCTYPE html>
<html lang="ja">

<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入履歴</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'history.css'); ?>">
</head>

<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <h1>購入履歴</h1>
  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <?php if (count($histories) > 0) { ?>
      <table classs="table rable-bodered">
        <thead claee="thead-light">
          <table>
            <thead>
              <tr>
                <th>注文番号</th>
                <th>購入日時</th>
                <th>合計金額</th>
              </tr>
            </thead>
          </table>
          <?php foreach ($histories as $history) { ?>}
          <tr>
            <?php print(h($history['oreder_id'])); ?>
            <?php print(h($history['date'])); ?>
            <?php print(h($history['total'])); ?>
            <td>
              <form method="post" action="cart.php">
                <input type="submit" value="購入明細表示">
                <input type="hidden" name="oreder_id" value="<?php print(h($history['oreder_id'])); ?>">
              </form>
            </td>
          </tr>
      </table>
    <?php } ?>

  <?php } else { ?>
    <p>購入履歴がありません</p>
  <?php } ?>
</body>

</html>