<?php

    $conn = mysqli_connect("localhost","root","","careers maker");

    if (!$conn) {
        echo "Connection error: " . mysqli_connect_error();
    }
?>