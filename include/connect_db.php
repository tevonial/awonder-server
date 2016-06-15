<?php
//RPi
define("LHOST",     "localhost");
define("LUSER",     "apache-lim");
define("LPASSWORD", "IGotAnswers");
define("LDATABASE", "ew");
$mysqli_qa = new mysqli(LHOST, LUSER, LPASSWORD, LDATABASE);

$ANSWER_QUOTA = 5;
?>