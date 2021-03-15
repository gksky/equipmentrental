<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    
    $site = "https://арендаспецтехники.бел/";
    include "../config/database.php";
    $mysqli = new mysqli($host, $user, $pass, $db);
    $i = 0;
    $result = $mysqli->query("SELECT * FROM partners");
        if ($result) {
            echo "[ ";
            while ($row = $result->fetch_assoc()) {
                if ($i) echo ",";
                echo json_encode($row);
                $i = 1;
            }
            echo " ]";
        }
    $mysqli->close();
    
    
?>