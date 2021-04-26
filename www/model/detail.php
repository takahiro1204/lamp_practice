<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function
acquisition_details($db)
{
    $sql = "SELECT details.item_id,price,amount,create_datetime,sum(amount*price) as total
           from details
           inner join history on details.order_id = history.order_id
           group by details.item_id,price,amount,create_datetime 
           order by create_datetime desc";

       return fetch_all_query($db,$sql);
}

function
get_details($db,$order_id)
{
    $sql = "SELECT details.item_id,price,amount,create_datetime,sum(amount*price) as total
    from details
    inner join history on details.order_id = history.order_id
    WHERE user_id = ?
    group by details.item_id,price,amount,create_datetime 
    order by create_datetime desc";

return fetch_all_query($db, $sql, array($order_id));
}
