<?php
    require_once "../config/db.config.php";

    $u_id = $_GET['user_id'];

    $delete_sql = "DELETE FROM user WHERE U_ID = $u_id";
    $delete_query = mysqli_query($conn, $delete_sql);
    header("location: ../index.php");
?>