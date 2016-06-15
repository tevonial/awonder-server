<?php
$uid = $_GET['uid']; 

if ($uid != NULL) {
    include_once 'include/connect_db.php';
    if (isset($_GET['poll'])) {
        $result = $mysqli_qa->query("SELECT poll, mode FROM users WHERE uid='{$uid}'")->fetch_row();
        echo json_encode(array("poll" => $result[0], "mode" => $result[1]));
    }
    
    else if (isset($_GET['count'])) {
        $result = $mysqli_qa->query("SELECT response FROM users WHERE uid='{$uid}'")->fetch_row();
        echo json_encode(array("count" => $result[0]));
    }
    
    else if (isset ($_GET['state'])) {
        $result = $mysqli_qa->query("SELECT status FROM users WHERE uid='{$uid}'")->fetch_row();
        echo json_encode(array("state" => $result[0]));
    }
}

?>