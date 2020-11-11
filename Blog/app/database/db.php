<?php
    require('connection.php');

    $query = "SELECT * FROM usuario";

    if ($result = $conn->query($query))
    {
        while ($row = $result->fetch_assoc())
            echo $row['nome']."<br/>";
    
        $result->free();
    }
?>