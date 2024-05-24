<?php
// We will handling everything related to the databases in this file

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "datawarehouse";
$conn = "";
try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
} catch (mysqli_sql_exception) {



    echo "Could not connect<br>";
}
if ($conn) {

    // echo date('d', strtotime(date('24-12-2024')));
    // echo "Connected<br>";
}
