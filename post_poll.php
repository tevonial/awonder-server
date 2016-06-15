<?php

$json = json_decode($HTTP_RAW_POST_DATA, true);

$uid = $json['uid'];
$poll = $json['poll'];
$mode = $json['mode'];

if ($uid != NULL && $poll != NULL) {
    
    include_once 'include/connect_db.php';
    $status = $mysqli_qa->query("SELECT status FROM users WHERE uid='{$uid}'")->fetch_row()[0];
    
    if ($status == '0') {
        $mysqli_qa->query("UPDATE users SET status = '-1', poll = '{$poll}', mode='{$mode}', response = '0' WHERE uid='{$uid}'");
        
        $log =  "logs/{$uid}.log";
        $fp = fopen($log, "w");
        ftruncate($fp, 0);
        fclose($fp);
        echo json_encode(array(NULL => NULL));
    }
}

?>