<?php

    session_start();

    $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

    if (isset($_SESSION["name"])) {
        $name = $_SESSION["name"];
    } else {
        $name = "";
        header('Location: LoginIn.php');
    }

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        <?php include "styles/main.css" ?>
        <?php include "styles/bootstrap.css" ?>
    </style>
</head>
<body>
    <header style="height: fit-content !important;" class="container py-2 d-flex  flex-row fs-4">
        <nav class="container d-flex justify-content-between align-items-center flex-row gap-5 fs-4">
            <div class="icon text-start">Carrers</div>
            <ul style="margin-bottom: 0px !important;" class="list-unstyled d-flex flex-row gap-5">
                <li id="<?php echo substr($curPageName, 0, -4)?>" class="link-1 active">
                    <a style="margin-right: 6px !important;" href="Home.php">
                        <i class="fa-solid fa-house"></i>
                    </a>
                </li>
                <li id="<?php echo substr($curPageName, 0, -4)?>" class="link-2">
                    <a style="margin-right: 6px !important;" href="jobs.php">
                        <i class="fa-solid fa-briefcase"></i>
                    </a>
                </li>
                <li id="<?php echo substr($curPageName, 0, -4)?>" class="link-3">
                        <a style="margin-right: 6px !important;" href="contact-us.php"><i class="fa-solid fa-square-phone"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="prf fs-4" style="padding-left: 10px;" id="<?php echo substr($curPageName, 0, -4)?>">
            <a style="margin-right: 6px !important; cursor: pointer;" onclick="Drop()">
                <span style="height: 35px;width:35px;border-radius:50%;background-color:black;"></span><p style="user-select: none;"><?php echo htmlspecialchars($name) ?></p>
                <i class="fa-solid fa-caret-down"></i>
            </a>
            <div class="drop-menu d-none">
                <div class="bg-first border-bottom border-secondary" style="user-select: none;cursor: pointer;">Profile</div>
                <div class="bg-first" style="user-select: none;cursor: pointer;"><a class="w-100 h-100" style="color: inherit !important;" href="LogOut.php">Log Out</a></div>
            </div>
        </div>
    </header>