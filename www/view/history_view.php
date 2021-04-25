<!DOCTYPE html>
<html lang="ja">

<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入履歴</title>
</head>

<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>

  <h1>購入履歴</h1>
  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <?php if (count($histories) > 0) { ?>
      <table class="table table-bodered">
        <thead class="thead-light">
          <tr>
            <th>注文番号</th>
            <th>購入日時</th>
            <th>合計金額</th>
            <th>明細ボタン</th>
          </tr>
        </thead>
        <tdody>
          <?php foreach ($histories as $history) { ?>
            <tr>
              <td><?php print(h($history['order_id'])); ?></td>
              <td><?php print(h($history['create_datetime'])); ?></td>
              <td><?php print(h($history['total'])); ?></td>
              <form method="post" action="detail.php">
                <td><input type="submit" value="購入明細表示"></td>
                <input type="hidden" name="order_id" value="<?php print(h($history['order_id'])); ?>">
              </form>
            </tr>
          <?php } ?>
        </tbody>
      </table>
  </div>

<?php } else { ?>
  <p>購入履歴がありません</p>
<?php } ?>
</body>

</html>