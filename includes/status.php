<?php
$parentFile = "Status"; //$parentFile is used to find what file called includes header so header cna be set to file name. DO NOT EDIT
require 'header.php';
// echo 'for debugging<br>';
// foreach($_SESSION['student'] as $key=>$value)
//     {
//     // and print out the values
//     echo 'The value of $_SESSION['."'".$key."'".'] is '."'".$value."'".' <br />';
//     }
?>
<body>
<div class="sidebar">
    <a href="../database-entry.php">Database Entry</a>
    <a href="../includes/admission.php">Admission</a>
    <a href="../includes/award.php">Awards</a>
    <a href="../includes/comps.php">Comps</a>
    <a href="#Publications">Publications</a>
    <a href="../includes/presentations.php">Presentation</a>
    <a href="../includes/progress.php">Progress</a>
    <a class="active" href="../includes/status.php">Status</a>
</div>
<form method="get" action="">
    <div class="content">
        <div class="contentLeft">
            <h3>Student Information</h3>
            <p id="row">
                <label for="sInfo">*Student(First/Last): </label>
                <?php
                if(!isset($_SESSION['student'])){
                    echo '<input type="text" id="nameField" name="firstName" required >
                          <label for="AwardDetails"> </label><input type="text" id="LnameField" name="lastName" required><br><br>
                          <label for="sInfo"> *ID: </label><input type="text" id="S_ID" name="studentID" required><br><br></p>
                          <label for="AwardDetails">*Degree: </label><input type="radio" id="MSc" name = "degree" value="MSc"> <label for="degreeLabel" required> MSc</label>
                          <input type="radio" id="PhD" name="degree" value="PhD"><label for="degreeLabel" required> PhD(Includes clinical MSc/PhD fast-track)</label><br><br>
                          <label for="AwardDetails">*Program: </label></label>
                          <input type="radio" id="clinical" name = "program" value="clinical" required> <label for="programLabel"> Clinical</label>
                          <input type="radio" id="neuro" name="program" value="neuroscience" required><label for="programLabel"> Neuroscience</label>
                          <input type="radio" id="psych" name="program" value="psychology" required><label for="programLabel"> Psychology</label><br><br>
                          <label for="studentSupervisor">*Supervisor(F/L): </label><select name="studentSlutations" id="salutations" required>
                          <option value="mr">Mr.</option><option value="miss">Miss</option>
                          </select><label for="supervisorFName"> </label><input type="text" id="emailField" name="supervisorFName" required>
                          <label for="supervisorLName"> </label><input type="text" id="emailField" name="supervisorLName" required><br><br>
                          <label for="studentEmail">*Student Email: </label><input type="text" id="emailField" name="email"  required>';
                }
                
                else{
                    echo '<input type="text" id="nameField" name="firstName" value="'.$_SESSION['student'][0].'"></input>
                          <label for="StatusDetails"> </label><input type="text" id="LnameField" value="'.$_SESSION['student'][1].'"></input><br><br>
                          <label for="sInfo"> *ID: </label><input type="text" id="S_ID" name="studentID" value="'.$_SESSION['student'][2].'"></input></p>
                          <label for="AwardDetails">*Degree: </label>';

                    if($_SESSION['student'][3]=="MSc"){
                          echo '<input type="radio" id="MSc" name="degree" value="MSc" checked="checked"> <label for="degreeLabel" required> MSc</label>
                          <input type="radio" id="PhD" name="degree" value="PhD"><label for="degreeLabel" required> PhD(Includes
                          clinical MSc/PhD fast-track)</label><br><br>';
                    }
                    else if($_SESSION['student'][3]=='PhD'){
                          echo '<input type="radio" id="MSc" name="degree" value="MSc"> <label for="degreeLabel" required> MSc</label>
                          <input type="radio" id="PhD" name="degree" value="PhD" checked="checked"><label for="degreeLabel" required> PhD(Includes
                          clinical MSc/PhD fast-track)</label><br><br>';
                    }
                    else{
                          echo '<input type="radio" id="MSc" name="degree" value="MSc"> <label for="degreeLabel" required> MSc</label>
                          <input type="radio" id="PhD" name="degree" value="PhD"><label for="degreeLabel" required> PhD(Includes
                          clinical MSc/PhD fast-track)</label><br><br>';
                    }
            
                    echo'<label for="AwardDetails">*Program: </label>';
                    
                    if($_SESSION['student'][4]=="Clinical")
                          echo '<input type="radio" id="clinical" name="program" value="clinical" checked = "checked" required> <label for="programLabel">Clinical</label>
                          <input type="radio" id="neuro" name="program" value="neuroscience" required><label for="programLabel">Neuroscience</label>
                          <input type="radio" id="psych" name="program" value="psychology" required><label for="programLabel">Psychology</label><br><br>';
                    else if($_SESSION['student'][4]=="Neuroscience"){
                          echo '<input type="radio" id="clinical" name="program" value="clinical" required> <label for="programLabel">Clinical</label>
                          <input type="radio" id="neuro" name="program" value="neuroscience" checked = "checked" required><label for="programLabel">Neuroscience</label>
                          <input type="radio" id="psych" name="program" value="psychology" required><label for="programLabel">Psychology</label><br><br>';
                    }
                    else if($_SESSION['student'][4]=="Psychology"){
                          echo '<input type="radio" id="clinical" name="program" value="clinical" required> <label for="programLabel">Clinical</label>
                          <input type="radio" id="neuro" name="program" value="neuroscience" required><label for="programLabel">Neuroscience</label>
                          <input type="radio" id="psych" name="program" value="psychology" checked = "checked" required><label for="programLabel">Psychology</label><br><br>';
                    }
                    else{
                          echo '<input type="radio" id="clinical" name="program" value="clinical" required> <label for="programLabel">Clinical</label>
                          <input type="radio" id="neuro" name="program" value="neuroscience" required><label for="programLabel">Neuroscience</label>
                          <input type="radio" id="psych" name="program" value="psychology" required><label for="programLabel">Psychology</label><br><br>';
                    }
            
                    echo '<label for="studentSupervisor">*Supervisor(F/L): </label>
                          <select name="studentSlutations" id="salutations" required>';
            
                    if($_SESSION['student'][5]=="mr"){
                          echo '<option value="mr">Mr.</option>
                          <option value="miss">Miss</option>';
                    }
                    
                    else{
                          echo '<option value="miss">Miss</option>
                          <option value="mr">Mr.</option>';
                    }
            
                    echo '<option value="mr">Mr.</option>
                         <option value="miss">Miss</option>
                         </select><label for="supervisorFName"> </label>
                         <input type="text" id="emailField" name="supervisorFName" required value="'.$_SESSION['student'][6].'"></input>
                         <label for="supervisorLName"> </label>
                         <input type="text" id="emailField" name="supervisorLName" required value="'.$_SESSION['student'][7].'"></input><br><br>
                         <label for="studentEmail">*Student Email: </label>
                         <input type="text" id="emailField" name="email" required value="'.$_SESSION['student'][8].'"></input>'; 
                }


            ?>
            <br><br>
            <hr style="width: 166%">

            <section class="milestone">
                <div class="MScStatus">
                    <h3>MSc</h3>
                    <label for="MScDetails">MSc Defense: </label>
                    <input type="date" id="mscDefense" name="mscDefenseDate" value="- -" min="2000-01-01"
                           required><br><br>
                    <label for="MScDetails">Consider for thesis award: </label>
                    <input type="date" id="thesisAward" name="thesisAward" value="- -" min="2000-01-01"
                           required><br><br>
                    <label for="MScDetails">MSc Convocation: </label>
                    <input type="date" id="mscConvocation" name="mscConvocation" value="- -" min="2000-01-01" required>
                </div>

                <div class="PhDStatus">
                    <h3>PhD</h3>
                    <label for="PhDDetails">Comp Completion: </label>
                    <input type="date" id="phdComp" name="phdComp" value="- -" min="2000-01-01" required><br><br>
                    <label for="PhDDetails">PhD Defense: </label>
                    <input type="date" id="phdDefense" name="phdDefenseDate" value="- -" min="2000-01-01"
                           required><br><br>
                    <label for="PhDDetails">Consider for dissertation award: </label>
                    <input type="text" id="dissertationAward" name="dissertationField" size="10px" required><br><br>
                    <label for="PhDDetails">Convocation date: </label>
                    <input type="date" id="mscConvocation" name="mscConvocationDate" value="- -" min="2000-01-01"
                           required><br><br>
                    <label for="PhDDetails">Intership start: </label>
                    <input type="date" id="internship" name="internshipDate" value="- -" min="2000-01-01"
                           required><br><br>
                    <label for="PhDDetails">Location: </label>
                    <input type="text" id="location" name="locationField" size="10px" required>
                </div>
            </section>
            <h3>Termination</h3>
            <p id="row">
                <label for="term">Dismissed </label>
                <input type="date" id="dismissed" name="termDate" value="- -" min="2000-01-01" required>
                <label for="term">Withdrawn </label>
                <input type="date" id="withdrawn" name="withdrawDate" value="- -" min="2000-01-01" required><br><br>
            </p>
            <hr style="width: 166%">
            <h3>Leaves</h3>
            <p id="row">
                <label for="leaves"> Start: </label>
                <input type="date" id="leaveStart" name="leaveStartDate" value="- -" min="2000-01-01" required>
                <label for="leaves"> Months of Approved Leave </label>
                <input type="text" id="approvedMonths" name="leavesMonths" size="10px" required>
                <label for="leaves"> Type of leave: </label>
                <input type="text" id="leaveType" name="leaveTypeField" size="10px" required><br>
                <label for="leaves"> Start: </label>
                <input type="date" id="leaveStart" name="leaveStartDate" value="- -" min="2000-01-01" required>
                <label for="leaves"> Months of Approved Leave </label>
                <input type="text" id="approvedMonths" name="leavesMonths" size="10px" required>
                <label for="leaves"> Type of leave: </label>
                <input type="text" id="leaveType" name="leaveTypeField" size="10px" required><br>
                <label for="leaves"> Start: </label>
                <input type="date" id="leaveStart" name="leaveStartDate" value="- -" min="2000-01-01" required>
                <label for="leaves"> Months of Approved Leave </label>
                <input type="text" id="approvedMonths" name="leavesMonths" size="10px" required>
                <label for="leaves"> Type of leave: </label>
                <input type="text" id="leaveType" name="leaveTypeField" size="10px" required><br>
                <label for="leaves"> Start: </label>
                <input type="date" id="leaveStart" name="leaveStartDate" value="- -" min="2000-01-01" required>
                <label for="leaves"> Months of Approved Leave </label>
                <input type="text" id="approvedMonths" name="leavesMonths" size="10px" required>
                <label for="leaves"> Type of leave: </label>
                <input type="text" id="leaveType" name="leaveTypeField" size="10px" required><br><br>
            </p>
            <hr style="width: 166%">
            <h3>Program Status</h3>
            <label for="term">Years in MSc: </label>
            <input type="number" id="MScY" name="MScYears" min="1" max="10">
            <label for="term">Number of residency years: </label>
            <input type="number" id="quantity" name="quantity" min="1" max="10">
            <label for="term">Require to TA: </label>
            <input type="radio" id="requireTAYes" name="requireTA" value="yes"> <label for="requireTAYesLabel">
                Yes</label>
            <input type="radio" id="requireTANO" name="requireTA" value="no"><label for="requireTANoLabel">
                No</label><br><br>
            <label for="term">Years in PhD: </label>
            <input type="number" id="PhDquantity" name="PhDQuantity" min="1" max="10">
            <label for="term">Funding eligibility ends: </label>
            <input type="date" id="FEE" name="fundingEligibility" value="- -" min="2000-01-01" required>
            <label for="term">Program end date: </label>
            <input type="date" id="PED" name="programEndDate" value="- -" min="2000-01-01" required>
            <label for="statusNotes">Notes</label>
            <textarea type="text" id="notes" name="statusBox" rows="3" cols="23"></textarea>
        </div>
    </div>
</form>
</body>
<?php
require 'footer.php';
?>
