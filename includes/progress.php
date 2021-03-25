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
    <a class="active" href="../includes/progress.php">Progress</a>
    <a href="../includes/status.php">Status</a>
</div>
<form method="get">
    <form method="get" action="">
        <div class="content">
            <div class="contentLeft">
                <h3>Student Information</h3>
                <p id="row">
                    <label for="sInfo">*Student(First/Last): </label>
                    <?php
                if(!isset($_SESSION['student'])){
                    echo '<input type="text" id="nameField" name="firstName" required><label for="ProgressDetails"> </label>
                          <input type="text" id="LnameField" name="lastName" required><br><br>
                          <label for="sInfo"> *ID: </label>
                          <input type="text" id="S_ID" name="studentID" required><br><br></p>
                          <label for="ProgressDetails">*Degree: </label><input type="radio" id="MSc" name="degree" value="MSc"> <label for="degreeLabel" required> MSc</label>
                          <input type="radio" id="PhD" name="degree" value="PhD"><label for="degreeLabel" required> PhD(Includes clinical MSc/PhD fast-track)</label><br><br>
                          <label for="ProgressDetails">*Program: </label></label><input type="radio" id="clinical" name="program" value="clinical" required> <label for="programLabel">Clinical</label>
                          <input type="radio" id="neuro" name="program" value="neuroscience" required><label for="programLabel">Neuroscience</label>
                          <input type="radio" id="psych" name="program" value="psychology" required><label for="programLabel">Psychology</label><br><br>
                          <label for="studentSupervisor">*Supervisor(F/L): </label><select name="studentSlutations" id="salutations" required>
                          <option value="mr">Mr.</option><option value="miss">Miss</option></select>
                          <label for="supervisorFName"> </label><input type="text" id="emailField" name="supervisorFName" required>
                          <label for="supervisorLName"> </label><input type="text" id="emailField" name="supervisorLName" required><br><br>
                          <label for="studentEmail">*Student Email: </label><input type="text" id="emailField" name="email" required>';
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
                <hr class="dataEntry_Hr">
                <h3>FGS Progress Evaluation</h3>
                <div class="contentRight">
                    <label for="myfile">Import progress info:</label>
                    <input type="file" id="progress_file" name="progress_file"><br><br>
                </div>
                <div class="contentLeft">

                    <label for="ProgressDetails"></label>

                    <table>
                        <tr>
                            <th><h4>Year</h4></th>
                            <th><h4>Satisfactory?</h4></th>
                            <th><h4>Extension?</h4></th>
                            <th><h4>Comments</h4></th>
                        </tr>
                        <tr>
                            <td><input type="text" id="FGSyear" name="year"></td>
                            <td>
                                <input type="radio" id="satisfactory" value="Yes"> <label for="ProgressDetails" >Yes
                                <p><input type="radio" id="satisfactory" value="No"> <label for="ProgressDetails" >No
                            </td>
                            <td>
                                <input type="radio" id="extension" value="First"> <label for="ProgressDetails" >First
                                <p><input type="radio" id="extension" value="Last"> <label for="ProgressDetails" >Last
                                <p><input type="radio" id="extension" value="N/A"> <label for="ProgressDetails" >N/A
                            </td>
                            <td><input type="text" id="FGScomments" name="comments"></td>
                        </tr>
                    </table>


                </div>

            </div>
        </div>
    </form>
</body>
<?php
require '../includes/footer.php';
?>
