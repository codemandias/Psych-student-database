<?php
$parentFile = "Publications"; //$parentFile is used to find what file called includes header so header cna be set to file name. DO NOT EDIT
$pageDir = basename(__DIR__);
require 'includes/header.php';
?>

<div class="sidebar">
    <a href="./database-entry.php">Database Entry</a>
    <a href='./includes/admission.php'>Admission</a>
    <a href="./includes/award.php">Awards</a>
    <a href="./includes/comps.php">Comps</a>
    <a class="active" href="#Publications">Publications</a>
    <a href="#Presentation">Presentation</a>
    <a href="./includes/progress.php">Progress</a>
    <a href="./includes/status.php">Status</a>
</div>

<form method="post" action="../includes/process-admission.php">
    <div class="content">
        <div class="contentLeft">
        <h3>Student Information</h3>
             <p id="row">
                <label for="sInfo">*Student(First/Last): </label>
                <input type="text" id="nameField" name="admissionFirstName">
                <label for="studentDetails"> </label>
                <input type="text" id="LnameField" name="admissionLastName"><br><br>
            </p>
            <p id="row">
               <label for="sInfo"> *ID: </label>
               <input type="text" id="S_ID" name="admissionStudentID"><br><br>
            </p>
            <label for="studentDetails">*Degree: </label>
            <input type="radio" id="MSc" name="admissionDegree" value="MSc"> <label for="degreeLabel"> MSc</label>
            <input type="radio" id="PhD" name="admissionDegree" value="PhD"><label for="degreeLabel"> PhD(Includes clinical MSc/PhD fast-track)</label><br><br>
            <label for="studentDetails">*Program: </label></label>
            <input type="radio" id="clinical" name="admissionProgram" value="Clinical"> <label for="programLabel"> Clinical</label>
            <input type="radio" id="neuro" name="admissionProgram" value="Neuroscience"><label for="programLabel"> Neuroscience</label>
            <input type="radio" id="psych" name="admissionProgram" value="Psychology"><label for="programLabel"> Psychology</label><br><br>
            <label for="studentSupervisor">*Supervisor(F/L): </label>
            <select name="studentSalutations" id="admissionSalutations">
                <option value="mr">Mr.</option>
                <option value="miss">Miss</option>
            </select>
            <label for="supervisorFName"> </label><input type="text" id="admissionSupervisorFName" name="admissionSupervisorFName">
            <label for="supervisorLName"> </label><input type="text" id="admissionSupervisorLName" name="admissionSupervisorLName"><br><br>
            <hr style="width:310%;">

            <h3>Import student CVs</h3>
            <div class="UCV">
                <input type="file" id="myUCV" onchange="loadFile(event)" name="myfile"><br><br>
            </div>
            <h3>Name of publication</h3>
            <input type="text" placeholder="">

            <h3>Name of publication</h3>
            <input type="text" placeholder="">

            <h3>Modification date</h3>
            <input type="date" id="modDate" name="modDate" value="- -"
                min="2000-01-01" required><br>

        </div>
            <div class="contentIMG">
            <img id="admissionProfile" width="200" />
            <input type="file" id="myfile" onchange="loadFile(event)" name="myfile"><br><br>
            </div>
    </div>



<?php
    require 'includes/footer.php';
?>
