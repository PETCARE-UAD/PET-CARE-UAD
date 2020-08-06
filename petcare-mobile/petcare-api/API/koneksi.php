<?php

include 'config.php';

$conn = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die(mysqli_errno($conn));

?>