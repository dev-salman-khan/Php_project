<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "atechsolutions";

$con = mysqli_connect($server, $user, $password, $db);
if (!$con) {
    echo "Database Not Connected";
}
?>