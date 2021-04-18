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
                    <table>
                        <thead>
                            <tr>
                                <th>注文番号</th>
                                <th>購入日時</th>
                                <th>合計金額</th>
                            </tr>
                        </thead>
                    </table>
                    <?php foreach ($histories as $history) { ?>
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
                    <?php } ?>
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
                    <?php print(h($detail['name'])); ?>
                    <?php print(h($detail['price'])); ?>
                    <?php print(h($detail['amount'])); ?>
                    <?php print(h($detail['total'])); ?>
                </tr>
            <?php } ?>
        <?php } ?>
</body>

</html>