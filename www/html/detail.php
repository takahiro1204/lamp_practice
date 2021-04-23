<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'cart.php';
require_once MODEL_PATH . 'hidtory.php';

session_start();

if (is_logined() === false) {
    redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($user);

if (is_admin($user) === true) {
    $histories = insert_history($db, $user_id);
} else {
    $history = insert_history($db, $user['user_id']);
}

$detail = insert_details($db, $order_id, $item_id, $amount, $price);

include_once VIEW_PATH . 'detail_view.php';
