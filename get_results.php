<?php
$uid = $_GET['uid'];

if ($uid != NULL) {
    include_once 'include/connect_db.php';
    $status = $mysqli_qa->query("SELECT status FROM users WHERE uid='{$uid}'")->fetch_row()[0];
    if ($status == -1) { 
        $mysqli_qa->query("UPDATE users SET status='{$ANSWER_QUOTA}', response='0' WHERE uid='{$uid}'");
    }
    $log = "logs/{$uid}.log";
    if (file_exists($log)) {
        $raw = file_get_contents($log);
        
        $ret = array("results" => rtrim($raw, ','));
        echo json_encode($ret);
    }
}

?>