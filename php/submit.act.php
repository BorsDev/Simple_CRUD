<?php
    require_once "../config/db.config.php";

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    $insert_sql = "INSERT INTO user (`U_NAME`, `U_ADDRESS`) VALUES ('$nama', '$alamat');";
    $insert_query = mysqli_query($conn,$insert_sql);
    header("location: ../index.php");
?>