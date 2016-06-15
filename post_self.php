<?php
$json = json_decode($HTTP_RAW_POST_DATA, true);

$p_uid = $json['p_uid'];
$a = $json['a'];

if ($p_uid != NULL && $a != NULL) {
    include_once 'include/connect_db.php';
    $p_status = $mysqli_qa->query("SELECT status FROM users WHERE uid='{$p_uid}'")->fetch_row()[0];
    if ($p_status == -1) {
        $log =  "logs/{$p_uid}.log";
        if (file_exists($log)) {
            if (file_put_contents($log, "{$a},", FILE_APPEND)) {
                $mysqli_qa->query("UPDATE users SET response=response+1 WHERE uid='{$p_uid}'");
                echo json_encode(array(NULL => NULL));
            }
        }
    }
}

?>