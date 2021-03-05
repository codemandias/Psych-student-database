<?php

require_once("db.php");

if (isset($parentFile)) {
    $headerName = $parentFile;
} else {
    $headerName = "Psycology Graduate Database";
}
if (!isset($pageDir)) {
    $pageDir = basename(__DIR__);
}
if ($pageDir == "includes") {
    $stylePath = "../";
    $imgPath = "../";
} else {
    $stylePath = "";
    $imgPath = "";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset=\"utf-8\">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='<?php echo $stylePath . "css/styles.css" ?>'>
    <title>Psychology Graduate Database</title>
    <script src="../js/script.js"></script>
</head>

<body>
    <header class="head">
        <nav>
            <div>
                <a href="homepage.php"><img class='navbar_Logo' src='<?php echo $imgPath . "images/dalLogo.jpg" ?>' /></a>
                <h1 class='navbar_Header'><?php echo $headerName; ?></h1>
            </div>
            <hr class='navbar_Hr' />
            <div class="navbar_PageLinks">
                <a href="database-entry.php">Add a Student</a>
                <a href="homepage.php">Find a Student</a>
                <a href="databaseviewer.php">Database Viewer</a>
                <a href="calculations.php">Calculations</a>
            </div>
        </nav>
    </header>
</body>

</html>