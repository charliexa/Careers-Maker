<?php 

    include('./config/db_connect.php');

    $ID = $_GET['id'];

    mysqli_query($conn, "DELETE FROM posts WHERE id=$ID");
    header('location: Home.php');

?>