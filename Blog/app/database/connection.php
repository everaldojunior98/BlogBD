<?php
    $host = "localhost";
    $dbName = "teste";

    $username = "root";
    $password = "mysql";

    $conn = new mysqli($host, $username, $password, $dbName);

    if($conn->connect_error)
        die("Error: ".$conn->connect_error);
?>