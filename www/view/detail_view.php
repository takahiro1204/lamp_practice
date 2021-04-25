<!DOCTYPE HTML>
<html lang="ja">

<head>
    <?php include VIEW_PATH . 'template/head.php'; ?>
    <title>明細履歴</title>
    <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'detail.css'); ?>">
</head>

<body>
    <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
    <h1>明細履歴</h1>
    <div class="container">
        <?php include VIEW_PATH . 'templates/messages.php'; ?>
        <?php if (count($details) > 0) { ?>
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>注文番号</th>
                        <th>購入日時</th>
                        <th>合計金額</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($histories as $history) { ?>
                        <tr>
                            <th><?php print(h($history['order_id'])); ?></th>
                            <th><?php print(h($history['create_datetime'])); ?></th>
                            <th><?php print(h($history['total'])); ?></th>
                            <form method="post" action="detail.php">
                                <td><input type="submit" value="購入明細表示"></td>
                                <input type="hidden" name="order_id" value="<?php print(h($history['order_id'])); ?>">
                            </form>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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
            <?php foreach ($details as $detail) { ?>
                <tr>
                    <th><?php print(h($detail['item_id'])); ?></th>
                    <th><?php print(h($detail['price'])); ?></th>
                    <th><?php print(h($detail['amount'])); ?></th>
                    <th><?php print(h($detail['total'])); ?></th>
                </tr>
            <?php } ?>
        <?php } ?>
</body>

</html>