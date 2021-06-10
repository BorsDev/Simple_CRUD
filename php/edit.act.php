<?php
    require_once "../config/db.config.php";

    $u_id = $_GET['user_id'];
    $edt_name = $_POST['editnama'];
    $edt_address = $_POST['editalamat'];

    $edt_sql = "UPDATE user SET U_NAME = '$edt_name', U_ADDRESS = '$edt_address' WHERE U_ID = $u_id";
    $edt_query = mysqli_query($conn, $edt_sql);
    header("location: ../index.php");

?>