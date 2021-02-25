<?php
$parentFile = "Database Viewer"; //$parentFile is used to find what file called includes header so header cna be set to file name. DO NOT EDIT
require 'includes/header.php';
?>

<body>

<div class="sidebar">
  <button class="button-sidebar" type="button">Show all students</button>
  <button class="button-sidebar" type="button">Show by semester</button>
  <button class="button-sidebar" type="button">Show by program</button>
  <button class="button-sidebar" type="button">Show by degree</button>
</div>
<div class="contentTable">
  <table class="mytable">
    <tr>
    <th>Student Name</th>
    <th>Student Number</th>
    <th>Degree</th>
    <th>Program</th>
    </tr>
</div>
<?php
    require 'includes/footer.php';
    ?>
</body>
</html>
