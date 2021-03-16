<?php
$parentFile = "Admission"; //$parentFile is used to find what file called includes header so header cna be set to file name. DO NOT EDIT
require 'header.php';
?>
<body>
<div class="sidebar">
    <a href="../database-entry.php">Database Entry</a>
    <a class="active" href="../includes/admission.php">Admission</a>
    <a href="../includes/award.php">Awards</a>
    <a href="../includes/comps.php">Comps</a>
    <a href="../publications.php">Publications</a>
    <a href="../includes/presentations.php">Presentation</a>
    <a href="../includes/progress.php">Progress</a>
    <a href="../includes/status.php">Status</a>
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
            <label for="studentEmail">*Student Email: </label><input type="text" id="admissionStudentEmail" name="admissionStudentEmail"><br><br>
            <hr style="width:310%;">
            <h3>Academic Information</h3>

            <label for="studentDetails">*Date of Admission: </label>
            <input type="date" id="admission" name="admissionDate" value="- -" min="2000-01-01" required><br><br>
            <label for="studentDetails">*Foreign (Non-Canadian) Student?: </label>
            <input type="radio" id="yesID" name="foreign" value="yes"> <label for="nonCanLabel"> Yes</label>
            <input type="radio" id="noID" name="foreign" value="no"><label for="nonCanLabel"> No</label><br><br>
            <label for="studentDetails">*Holds Master degree at 1st admission: </label></label>
            <input type="radio" id="yesID" name="hasMaster" value="yes"> <label for="degreeLabel"> Yes</label>
            <input type="radio" id="noID" name="hasMaster" value="no"><label for="degreeLabel"> No</label><br><br>
            <label for="studentDetails">*Holds MSc from our department: </label></label>
            <input type="radio" id="yesID" name="holdsMSc" value="yes"> <label for="depLabel"> Yes</label>
            <input type="radio" id="noID" name="holdsMSc" value="no"><label for="depLabel"> No</label><br><br>
            <label for="studentDetails">*Date of transfer from our MSc to PhD: </label>
            <input type="text" id="transferDateField" name="TDF"><br><br>
            <label for="studentDetails">Transfer Number: </label>
            <input type="text" id="transferNoField" name="TNF"><br><br>
            <label for="studentDetails">Number of months off MSc to PhD: </label>
            <input type="text" id="monthsOffField" name="MFF"><br><br>
            <label for="studentDetails">*Additional residency required? </label></label>
            <input type="radio" id="yesID" name="resRequired" value="yes"> <label for="resLabel"> Yes</label>
            <input type="radio" id="noID" name="resRequired" value="no"><label for="resLabel"> No</label><br><br>
            <label for="studentDetails">*Most recent degree (Excluding our MSc): </label>
            <input type="text" id="recentDegree" name="RD"><br><br>
            <label for="studentDetails">*Most recent school (Excluding our MSc): </label>
            <input type="text" id="recentSchool" name="RS"><br><br>
            <label for="studentDetails">*Admission GPA: </label>
            <input type="text" id="admissionGPA" name="admissionGPA"><br><br>
            <p id="row">
                <label for="sInfo">*GPA based on final transcript (score): </label>
                <input type="text" id="finalGPA" name="finalGPA"><br><br>
            </p>
            <p id="row">
                <label for="sInfo"> Scale: </label>
                <input type="text" id="scaleField" name="SF">
            </p>
     </div>

        <div class="contentIMG">
            <img id="admissionProfile" width="200" />
            <input type="file" id="myfile" onchange="loadFile(event)" name="myfile"><br><br>
        </div>

        <div class="contentRight">
            <p id="row">
                <label for="gre">*GRE scaled score: </label>
                <input type="text" id="gre" name="gre">
                <label for="percentile"> (percentile): </label>
                <input type="text" id="percentile" name="grePercentile"><br><br>
            </p>

            <p id="row">
                <label for="gre">Verbal: </label>
                <input type="text" id="verbal" name="verbal">
                <label for="percentile"> </label>
                <input type="text" id="percentile" name="verbalPercentile"><br><br>
            </p>

            <p id="row">
                <label for="gre">Quantitative: </label>
                <input type="text" id="quantitative" name="quantitative">
                <label for="percentile"> </label>
                <input type="text" id="percentile" name="quantitativePercentile"><br><br>
            </p>

            <p id="row">
                <label for="gre">Analytical: </label>
                <input type="text" id="analytical" name="analytical">
                <label for="percentile"> </label>
                <input type="text" id="percentile" name="analyticalPercentile"><br><br>
            </p>

            <p id="row">
                <label for="gre">Experimental: </label>
                <input type="text" id="experimental" name="experimental">
                <label for="percentile"></label>
                <input type="text" id="percentile" name="experimentalPercentile"><br><br>
            </p>

            <p id="row">
                <label for="gre">Psychological: </label>
                <input type="text" id="psychological" name ="psychological">
                <label for="percentile"> </label>
                <input type="text" id="percentile" name="psychologicalPercentile"><br><br>
            </p>

            <p id="row">
                <label for="gre">Social: </label>
                <input type="text" id="social" name="social">
                <label for="percentile"> </label>
                <input type="text" id="percentile" name="socialPercentile"><br><br>
            </p>

            <label for="supervisor">Supervisor change? details below </label></label>
                <input type="radio" id="yesID" name="supervisorChange" value="yes"> <label for="yesLabel"> Yes</label>
                <input type="radio" id="noID" name="supervisorChange" value="no"><label for="noLabel"> No</label><br><br>

            <label for="notes">Notes</label><br>
                <textarea type="text" id="notes" name="notesBox" rows="9" cols="86"></textarea><br>

                <p>
                    (*) marks fields that are used to calculate finances,
                    it is critical the information is complete and
                    accurate
                </p>

            <label for="modification">Modification date: </label>
            <input type="text" id="modified" name="modified">
            <label for="creation">Creation date: </label>
            <input type="text" id="created" name="created">
            <label for="createdBy"> Created by: </label>
            <input type="text" id="author" name="author"><br><br>
            <input type = "submit" value="Add Student" id=sendButton>
            <input type="reset" value="Cancel" id=cancelButton>
        </div>
    </div>
</form>
</body>
<?php
require 'footer.php';
?>

