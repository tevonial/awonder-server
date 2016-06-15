<?php
$json = json_decode($HTTP_RAW_POST_DATA, true);

$uid = $json['uid'];
$state = $json['state'];

if ($uid != NULL && $state != NULL) {
    include_once 'include/connect_db.php';
    $mysqli_qa->query("UPDATE users SET status='{$state}' WHERE uid='{$uid}'");
    echo json_encode(array(NULL => NULL));
}

?>