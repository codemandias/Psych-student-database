<?php
$parentFile = "Administrator View"; //$parentFile is used to find what file called includes header so header cna be set to file name. DO NOT EDIT
$pageDir = basename(__DIR__);
require 'includes/header.php';
?>

<div class="sidebar">
    <a class="active" href="#Database-Entry">Database Entry</a>
    <a href='../Psychology-Department-Grad-Student-database/includes/admission.php'>Admission</a>
    <a href="../Psychology-Department-Grad-Student-database/includes/award.php">Awards</a>
    <a href="../Psychology-Department-Grad-Student-database/includes/comps.php">Comps</a>
    <a href="#Publications">Publications</a>
    <a href="../Psychology-Department-Grad-Student-database/includes/presentations.php">Presentation</a>
    <a href="../Psychology-Department-Grad-Student-database/includes/progress.php">Progress</a>
    <a href="../Psychology-Department-Grad-Student-database/includes/status.php">Status</a>
</div>

<form method="post" action="">
    <div class="content">
        <div class="contentLeft">
        <h3>Student Information</h3>
            <p id="row">
                <label for="sInfo">*Student(First/Last): </label>
                <input type="text" id="nameField" name="adminFirstName">
                <label for="studentDetails"> </label>
                <input type="text" id="LnameField" name="adminLastName"><br><br>
            </p>
            <p id="row">
                <label for="sInfo"> *ID: </label>
                <input type="text" id="S_ID" name="adminStudentID"><br><br>
            </p>
            <label for="studentDetails">*Degree: </label>
            <input type="radio" id="MSc" name="admin-degree" value="MSc"> <label for="degreeLabel"> MSc</label>
            <input type="radio" id="PhD" name="admin-degree" value="PhD"><label for="degreeLabel"> PhD(Includes clinical MSc/PhD fast-track)</label><br><br>
            <label for="studentDetails">*Program: </label></label>
            <input type="radio" id="clinical" name="admin-program" value="Clinical"> <label for="programLabel"> Clinical</label>
            <input type="radio" id="neuro" name="admin-program" value="Neuroscience"><label for="programLabel"> Neuroscience</label>
            <input type="radio" id="psych" name="admin-program" value="Psychology"><label for="programLabel"> Psychology</label><br><br>
            <label for="studentSupervisor">*Supervisor(F/L): </label>
            <select name="adminSupervisorSalutations" id="admissionSalutations">
                <option value="mr">Mr.</option>
                <option value="miss">Miss</option>
            </select>
            <label for="supervisorFName"> </label><input type="text" id="adminSupervisorFName" name="adminSupervisorFName">
            <label for="supervisorLName"> </label><input type="text" id="adminSupervisorLName" name="adminSupervisorLName"><br><br>

            <label for="studentSupervisor">*Co-Supervisor(F/L): </label>
            <select name="studentSalutations" id="admissionSalutations">
                <option value="mr">Mr.</option>
                <option value="miss">Miss</option>
            </select>
            <label for="supervisorFName"> </label><input type="text" id="admissionSupervisorFName" name="admissionSupervisorFName">
            <label for="supervisorLName"> </label><input type="text" id="admissionSupervisorLName" name="admissionSupervisorLName"><br><br>
            
            <label for="studentSupervisor">*Internal Supervisor(F/L): </label>
            <select name="studentSalutations" id="admissionSalutations">
                <option value="mr">Mr.</option>
                <option value="miss">Miss</option>
            </select>
            <label for="supervisorFName"> </label><input type="text" id="admissionSupervisorFName" name="admissionSupervisorFName">
            <label for="supervisorLName"> </label><input type="text" id="admissionSupervisorLName" name="admissionSupervisorLName"><br><br>


            <label for="studentEmail">*Student Email: </label><input type="text" id="adminStudentEmail" name="adminStudentEmail"><br><br>
            <hr style="width:310%;">
            <input type = "submit" value="Get Student" id=sendButton name="get_student">
        </div>

        <div class="contentIMG">
            <img id="admissionProfile" width="200" />
            <input type="file" id="myfile" onchange="loadFile(event)" name="myfile"><br><br>
        </div>
    </div>

    <?php 
            if (isset($_POST['get_student'])) { 
                $student_info=array($_POST['adminFirstName'], $_POST['adminLastName'], $_POST['adminStudentID'], $_POST['admin-degree'], $_POST['admin-program'], $_POST['adminSupervisorSalutations'], $_POST['adminSupervisorFName'], $_POST['adminSupervisorLName'], $_POST['adminStudentEmail']);
                $_SESSION['student']=$student_info;
            }
    ?>
    
</form>

<?php
    require 'includes/footer.php';
?>