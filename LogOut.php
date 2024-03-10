<?php

    include('./config/db_connect.php');

    session_start();
    session_unset();
    session_destroy();

    header('Location: LoginIn.php');

?>