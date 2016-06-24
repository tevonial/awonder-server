<?php
include_once 'include/connect_db.php';

if ($result = $mysqli_qa->query("SELECT uid, poll, mode FROM users WHERE poll <> '' AND status='-1' ORDER BY RAND() LIMIT 1")) {
    if ($result = $result->fetch_row()) {
        $ret = array("p_uid" => $result[0], "p_poll" => $result[1], "p_mode" => $result[2]);
        echo json_encode($ret);
    } else {
        $rand_poll = "hey?";
        $mysqli_qa->query("UPDATE users SET status = '-1', poll = '{$rand_poll}', mode='1' WHERE uid = 'bot'");

        $ret = array("p_uid" => "bot", "p_poll" => $rand_poll, "p_mode" => "1");
        echo json_encode($ret);
    }
}

?>