<?php
$parentFile = "Dalhousie Graduate Psychology Database"; //$parentFile is used to find what file called includes header so header cna be set to file name. DO NOT EDIT
$pageDir = basename(__DIR__);
require 'includes/header.php';
?>

<div class="sidebar">
    <a href="./database-entry.php">Database Entry</a>
    <a href='./includes/admission.php'>Admission</a>
    <a href="./includes/award.php">Awards</a>
    <a href="../includes/comps.php">Comps</a>
    <a href="./publications.php">Publications</a>
    <a href="#Presentation">Presentation</a>
    <a href="./includes/progress.php">Progress</a>
    <a href="./includes/status.php">Status</a>
</div>

<div class="content">
    <div class="contentLeft">
    <h3>Search for a Student</h3>
    <input type="text" placeholder="Search">
    </div>
</div>


<?php
    require 'includes/footer.php';
?>
