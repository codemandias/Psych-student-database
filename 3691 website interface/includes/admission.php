<?php
$parentFile = "Data Entry"; //$parentFile is used to find what file called includes header so header cna be set to file name. DO NOT EDIT
require 'header.php';
?>
    <body>
        <div class="sidebar">
          <a href="../database-entry.php">Database Entry</a>
          <a class="active" href="../3691 website interface/includes/admission.php">Admission</a>
          <a href="../includes/award.php">Awards</a>
          <a href="../includes/comps.php">Comps</a>
          <a href="#Publications">Publications</a>
          <a href="#Presentation">Presentation</a>
          <a href="#Progress">Progress</a>
          <a href="#Status">Status</a>
        </div>

        <form method="get" action="">
            <div class="content">
                <div class="contentLeft">
                    <h3>Student Information</h3>
                        <p id="row">
                            <label for="sInfo">*Student(First/Last): </label>
                            <input type="text" id="nameField" name="firstName">
                            <label for="studentDetails"> </label>
                            <input type="text" id="LnameField" name="lastName"><br><br>
                        </p>
                        <p id="row">
                            <label for="sInfo"> *ID: </label>
                                <input type="text" id="S_ID" name="studentID"><br><br>
                        </p>
                        <label for="studentDetails">*Degree: </label>
                            <input type="radio" id="MSc" name="degree" value="MSc"> <label for="degreeLabel"> MSc</label>
                            <input type="radio" id="PhD" name="degree" value="PhD"><label for="degreeLabel">
                            PhD(Includes clinical MSc/PhD fast-track)</label><br><br>
                        <label for="studentDetails">*Program: </label></label>
                        <input type="radio" id="clinical" name="program" value="clinical"> <label for="programLabel">
                            Clinical</label>
                        <input type="radio" id="neuro" name="program" value="neuroscience"><label for="programLabel">
                            Neuroscience</label>
                        <input type="radio" id="psych" name="program" value="psychology"><label for="programLabel">
                            Psychology</label><br><br>
                        <label for="studentSupervisor">*Supervisor(F/L): </label>
                            <select name="studentSlutations" id="salutations">
                                <option value="mr">Mr.</option>
                                <option value="miss">Miss</option>
                            </select>
                        <label for="supervisorFName"> </label><input type="text" id="emailField" name="email">
                        <label for="supervisorLName"> </label><input type="text" id="emailField" name="email"><br><br>
                        <label for="studentEmail">*Student Email: </label><input type="text" id="emailField" name="email"><br><br>
                        <hr style="width:310%;">
                        <h3>Academic Information</h3>

                        <label for="studentDetails">*Date of Admission: </label>
                            <input type="date" id="admission" name="admissionDate" value="- -" min="2000-01-01" required><br><br>
                        <label for="studentDetails">*Foreign (Non-Canadian) Student?: </label>
                            <input type="radio" id="yesID" name="foreign" value="yes"> <label for="nonCanLabel"> Yes</label>
                            <input type="radio" id="noID" name="foreign" value="no"><label for="nonCanLabel"> No</label><br><br>
                        <label for="studentDetails">*Holds Master degree at 1st admission: </label></label>
                            <input type="radio" id="yesID" name="degree" value="yes"> <label for="degreeLabel"> Yes</label>
                            <input type="radio" id="noID" name="degree" value="no"><label for="degreeLabel"> No</label><br><br>
                        <label for="studentDetails">*Holds MSc from our department: </label></label>
                            <input type="radio" id="yesID" name="dep" value="yes"> <label for="depLabel"> Yes</label>
                            <input type="radio" id="noID" name="dep" value="no"><label for="depLabel"> No</label><br><br>
                        <label for="studentDetails">*Date of transfer from our MSc to PhD: </label>
                            <input type="text" id="transferDateField" name="transferDate"><br><br>
                        <label for="studentDetails">Transfer Number: </label>
                            <input type="text" id="transferNoField" name="transferNo"><br><br>
                        <label for="studentDetails">Number of months off MSc to PhD: </label>
                            <input type="text" id="monthsOffField" name="monthsOff"><br><br>
                        <label for="studentDetails">*Additional residency required? </label></label>
                            <input type="radio" id="yesID" name="resRequired" value="yes"> <label for="resLabel"> Yes</label>
                            <input type="radio" id="noID" name="resRequired" value="no"><label for="resLabel"> No</label><br><br>
                        <label for="studentDetails">*Most recent degree (Excluding our MSc): </label>
                            <input type="text" id="recentDegree"><br><br>
                        <label for="studentDetails">*Most recent school (Excluding our MSc): </label>
                            <input type="text" id="recentSchool"><br><br>
                        <label for="studentDetails">*Admission GPA: </label>
                            <input type="text" id="admissionGPA"><br><br>
                        <p id="row">
                            <label for="sInfo">*GPA based on final transcript (score): </label>
                                <input type="text" id="finalGPA"><br><br>
                        </p>
                        <p id="row">
                            <label for="sInfo"> Scale: </label>
                                <input type="text" id="scale">
                        </p>
                </div>

                <div class="contentIMG">
                    <img id="admissionProfile" width="200" />
                    <input type="file" id="myfile" onchange="loadFile(event)" name="myfile"><br><br>
                </div>

                <div class="contentRight">
                    <p id="row">
                        <label for="gre">*GRE scaled score Verbal: </label>
                        <input type="text" id="gre">
                        <label for="percentile"> (percentile): </label>
                        <input type="text" id="percentile"><br><br>
                    </p>

                    <p id="row">
                        <label for="gre">Verbal: </label>
                        <input type="text" id="gre">
                        <label for="percentile"> </label>
                        <input type="text" id="percentile"><br><br>
                    </p>

                    <p id="row">
                        <label for="gre">Quantitative: </label>
                        <input type="text" id="gre">
                        <label for="percentile"> </label>
                        <input type="text" id="percentile"><br><br>
                    </p>

                    <p id="row">
                        <label for="gre">Analytical: </label>
                        <input type="text" id="gre">
                        <label for="percentile"> </label>
                        <input type="text" id="percentile"><br><br>
                    </p>

                    <p id="row">
                        <label for="gre">Experimental: </label>
                        <input type="text" id="gre">
                        <label for="percentile"></label>
                        <input type="text" id="percentile"><br><br>
                    </p>

                    <p id="row">
                        <label for="gre">Psychological: </label>
                        <input type="text" id="gre">
                        <label for="percentile"> </label>
                        <input type="text" id="percentile"><br><br>
                    </p>

                    <p id="row">
                        <label for="gre">Social: </label>
                        <input type="text" id="gre">
                        <label for="percentile"> </label>
                        <input type="text" id="percentile"><br><br>
                    </p>

                    <label for="supervisor">Supervisor change? details below </label></label>
                        <input type="radio" id="yesID" name="supervisor" value="yes"> <label for="yesLabel"> Yes</label>
                        <input type="radio" id="noID" name="supervisor" value="no"><label for="noLabel"> No</label><br><br>

                    <label for="emailMessage">Notes</label><br>
                        <textarea type="text" id="notes" name="notesBox" rows="9" cols="86"></textarea><br>

                    <p>
                        (*) marks fields that are used to calculate finances,
                        it is critical the information is complete and
                        accurate
                    </p>

                    <label for="studentName">Modification date: </label>
                        <input type="text" id="nameField" name="firstName">
                    <label for="studentLName">Creation date: </label>
                        <input type="text" id="LnameField" name="lastName">
                    <label for="studentID"> Created by: </label>
                        <input type="text" id="S_ID" name="studentID"><br><br>
                    <input type = "submit" value="Add Student" id=sendButton>
                    <input type="reset" value="Cancel" id=cancelButton>
                </div>
            </div>
        </form>
    </body>
    <?php
        require 'footer.php';
    ?>
</html>
