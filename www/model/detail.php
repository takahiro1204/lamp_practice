<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function
acquisition_details($db, $order_id) //引数
{
    $sql = "SELECT name,details.price,amount,amount*details.price as total
           from details
           inner join items on details.item_id = items.item_id
           WHERE  order_id  = ?";

    return fetch_all_query($db, $sql, array($order_id));//配列
}

function
get_details($db, $user_id, $order_id)
{
    $sql = "SELECT name,details.price,amount,amount*details.price as total
    from details
    inner join history on details.order_id = history.order_id
    inner join items on details.item_id = items.item_id
    WHERE details.order_id = ? AND user_id = ?";

    return fetch_all_query($db, $sql, array($order_id, $user_id));
}

function
satelate_history($db, $order_id)
{
    $sql = "SELECT history.order_id,create_datetime,sum(amount*price) as total
from history
inner join details on history.order_id = details.order_id
WHERE history.order_id = ?
group by history.order_id ";


    return fetch_query($db, $sql, array($order_id));
}

function open_history($db, $user_id, $order_id)
{
    $sql = "SELECT history.order_id,create_datetime,sum(amount*price) as total
from history
inner join details on history.order_id = details.order_id
where user_id = ? AND history.order_id = ?

group by history.order_id ";


    return fetch_query($db, $sql, array($user_id, $order_id));
}
