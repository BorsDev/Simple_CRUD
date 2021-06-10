<?php
    $server_name = "localhost";
    $db_username = "root";
    $db_pass = "";
    $db_name = "user";
    
    $conn = mysqli_connect($server_name, $db_username, $db_pass, $db_name);
    
    if(!$conn){
        die("Connection Error" .mysqlu_connect_error());
    }
?>