<?php

include_once 'include/connect_db.php';

$mysqli_qa->query("INSERT INTO users VALUES (NULL, '', '5', '', '0', '0')");
$pri = $mysqli_qa->insert_id;
$uid = md5(uniqid($pri, true));
$mysqli_qa->query("UPDATE users SET uid = '{$uid}' WHERE pri = '{$pri}'");

$ret = array("uid" => $uid);

echo json_encode($ret);