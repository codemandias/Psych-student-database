<?php
$parentFile = "Progress"; //$parentFile is used to find what file called includes header so header cna be set to file name. DO NOT EDIT
require 'header.php';
?>
<body>
<div class="sidebar">
    <a href="../database-entry.php">Database Entry</a>
    <a href="../includes/admission.php">Admission</a>
    <a href="../includes/award.php">Awards</a>
    <a href="../includes/comps.php">Comps</a>
    <a href="#Publications">Publications</a>
    <a href="#Presentation">Presentation</a>
    <a class="active" href="#../includes/progress.php">Progress</a>
    <a href="../includes/status.php">Status</a>
</div>
<form method="get">
    <form method="get" action="">
        <div class="content">
            <div class="contentLeft">
                <h3>Student Information</h3>
                <p id="row">
                    <label for="sInfo">*Student(First/Last): </label>
                    <input type="text" id="nameField" name="firstName" required>
                    <label for="CompsDetails"> </label>
                    <input type="text" id="LnameField" name="lastName" required><br><br>
                    <label for="sInfo"> *ID: </label>
                    <input type="text" id="S_ID" name="studentID" required><br><br>
                </p>
                <label for="CompsDetails">*Degree: </label>
                <input type="radio" id="MSc" name="degree" value="MSc"> <label for="degreeLabel" required> MSc</label>
                <input type="radio" id="PhD" name="degree" value="PhD"><label for="degreeLabel" required> PhD(Includes
                    clinical MSc/PhD fast-track)</label><br><br>
                <label for="CompsDetails">*Program: </label></label>
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

                <hr class="dataEntry_Hr">
                <h3>FGS Progress Evaluation</h3>

            </div>
        </div>
    </form>
</body>
<?php
require '../includes/footer.php';
?>

