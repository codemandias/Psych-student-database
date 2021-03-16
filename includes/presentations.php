<?php
$parentFile = "Presentations"; //$parentFile is used to find what file called includes header so header cna be set to file name. DO NOT EDIT
require 'header.php';
?>
<body>
<div class="sidebar">
    <a href="../database-entry.php">Database Entry</a>
    <a href="../includes/admission.php">Admission</a>
    <a href="../includes/award.php">Awards</a>
    <a href="../includes/comps.php">Comps</a>
    <a href="#Publications">Publications</a>
    <a class="active" href="../includes/presentations.php">Presentation</a>
    <a href="../includes/progress.php">Progress</a>
    <a href="../includes/status.php">Status</a>
</div>
<form method="get" action="">
    <div class="content">
        <div class="contentLeft">
            <h3>Student Information</h3>
            <p id="row">
                <label for="sInfo">*Student(First/Last): </label>
                <input type="text" id="nameField" name="firstName" required>
                <label for="AwardDetails"> </label>
                <input type="text" id="LnameField" name="lastName" required><br><br>
                <label for="sInfo"> *ID: </label>
                <input type="text" id="S_ID" name="studentID" required><br><br>
            </p>
            <label for="AwardDetails">*Degree: </label>
            <input type="radio" id="MSc" name="degree" value="MSc"> <label for="degreeLabel" required> MSc</label>
            <input type="radio" id="PhD" name="degree" value="PhD"><label for="degreeLabel" required> PhD(Includes
                clinical MSc/PhD fast-track)</label><br><br>
            <label for="AwardDetails">*Program: </label></label>
            <input type="radio" id="clinical" name="program" value="clinical" required> <label for="programLabel">
                Clinical</label>
            <input type="radio" id="neuro" name="program" value="neuroscience" required><label for="programLabel">
                Neuroscience</label>
            <input type="radio" id="psych" name="program" value="psychology" required><label for="programLabel">
                Psychology</label><br><br>
            <label for="studentSupervisor">*Supervisor(F/L): </label>
            <select name="studentSlutations" id="salutations" required>
                <option value="mr">Mr.</option>
                <option value="miss">Miss</option>
            </select>
            <label for="supervisorFName"> </label>
            <input type="text" id="emailField" name="supervisorFName" required>
            <label for="supervisorLName"> </label>
            <input type="text" id="emailField" name="supervisorLName" required><br><br>
            <label for="studentEmail">*Student Email: </label>
            <input type="text" id="emailField" name="email" required><br><br>
            <hr style="width: 166%">

            <h3>Local or Regional</h3>
            <input type="file" id="localFiles" name="localFiles"><br><br>
            <textarea type="text" id="notes" name="statusBox" rows="10" cols="80"></textarea><br><br>
            <h3>National or International</h3>
            <input type="file" id="nationalFiles" name="noationalFiles"><br><br>
            <textarea type="text" id="notes" name="statusBox" rows="10" cols="80"></textarea><br><br>
            <input type = "submit" value="Submit" id=presentationSendButton>
        </div>
    </div>
</form>
</body>
<?php
require 'footer.php';
?>
