<?php
    $parentFile = "Comps"; //$parentFile is used to find what file called includes header so header cna be set to file name. DO NOT EDIT
    require 'header.php';
    ?>
    <body>
        <div class="sidebar">
            <a href="../database-entry.php">Database Entry</a>
            <a href="../includes/admission.php">Admission</a>
            <a href="../includes/award.php">Awards</a>
            <a class="active" href="../includes/comps.php">Comps</a>
            <a href="#Publications">Publications</a>
            <a href="#Presentation">Presentation</a>
            <a href="#Progress">Progress</a>
            <a href="../includes/status.php">Status</a>
        </div>
            <form method="get" action="">
            <div class="content">
            <div class = "contentLeft">
                <h3>Student Information</h3>
                    <p id = "row">
                        <label for="sInfo">*Student(First/Last): </label>
                            <input type="text" id="nameField" name="firstName" required >
                        <label for="CompsDetails"> </label>
                            <input type="text" id="LnameField" name="lastName" required><br><br>
                        <label for="sInfo"> *ID: </label>
                            <input type="text" id="S_ID" name="studentID" required><br><br>
                    </p>
                    <label for="CompsDetails">*Degree: </label>
                        <input type="radio" id="MSc" name = "degree" value="MSc"> <label for="degreeLabel" required> MSc</label>
                        <input type="radio" id="PhD" name="degree" value="PhD"><label for="degreeLabel" required> PhD(Includes clinical MSc/PhD fast-track)</label><br><br>
                    <label for="CompsDetails">*Program: </label></label>
                        <input type="radio" id="clinical" name = "program" value="clinical" required> <label for="programLabel"> Clinical</label>
                        <input type="radio" id="neuro" name="program" value="neuroscience" required><label for="programLabel"> Neuroscience</label>
                        <input type="radio" id="psych" name="program" value="psychology" required><label for="programLabel"> Psychology</label><br><br>
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
                        <input type="text" id="emailField" name="email"  required><br><br>

                        <hr style="width:310%;">
                        <label for="CompsDetails">Comp Chair(First/Last): </label>
                            <input type="text" id="comp_chair_first" name="comp_chair_first">
                            <input type="text" id="comp_chair_last" name="comp_chair_last">

                        <h2>Dissertation</h2><label for="CompsDetails">Title: </label>
                          <input type="text" id="title" name="title"><br>
                        <label for="CompsDetails">Comp Chair(First/Last): </label>
                          <input type="text" id="committee1_first" name="committee1_first">
                          <input type="text" id="committee1_last" name="committee1_last"><br>
                        <label for="CompsDetails">Comp Chair(First/Last): </label>
                          <input type="text" id="committee2_first" name="committee2_first">
                          <input type="text" id="committee2_last" name="committee2_last"><br>
                        <label for="CompsDetails">Comp Chair(First/Last): </label>
                          <input type="text" id="committee3_first" name="committee3_first">
                          <input type="text" id="committee3_last" name="committee3_last"><br>

                        <h2>Comp1</h2><label for="CompsDetails">Title: </label>
                          <input type="text" id="comp1_title" name="comp1_title"><br>
                        <label for="CompsDetails">Supervisor(First/Last): </label>
                          <input type="text" id="supervisor1_first" name="supervisor1_first">
                          <input type="text" id="supervisor1_last" name="supervisor1_last">
                        <label for="CompsDetails">Endpoint: </label>
                          <input type="text" id="supervisor1_endpoint" name="supervisor1_endpoint"><br>
                        <label for="CompsDetails">Co-Supervisor(First/Last): </label>
                          <input type="text" id="co_supervisor1_first" name="co_supervisor1_first">
                          <input type="text" id="co_supervisor1_last" name="co_supervisor1_last">
                        <label for="CompsDetails">Approved date(MM/DD/YYYY): </label>
                          <input type="date" id="supervisor1_appro_date" name="supervisor1_appro_date" value="- -" min="2000-01-01" ><br>
                        <label for="CompsDetails">Internal(First/Last): </label>
                          <input type="text" id="internal1_first" name="internal1_first">
                          <input type="text" id="internal1_last" name="internal1_last">
                        <label for="CompsDetails">*Completed date(MM/DD/YYYY): </label>
                          <input type="date" id="supervisor1_complete_date" name="supervisor1_complete_date" value="- -" min="2000-01-01" required><br>

                          <h2>Comp2</h2><label for="CompsDetails">Title: </label>
                            <input type="text" id="comp2_title" name="comp2_title"><br>
                          <label for="CompsDetails">Supervisor(First/Last): </label>
                            <input type="text" id="supervisor2_first" name="supervisor2_first">
                            <input type="text" id="supervisor2_last" name="supervisor2_last">
                          <label for="CompsDetails">Endpoint: </label>
                            <input type="text" id="supervisor2_endpoint" name="supervisor2_endpoint"><br>
                          <label for="CompsDetails">Co-Supervisor(First/Last): </label>
                            <input type="text" id="co_supervisor2_first" name="co_supervisor2_first">
                            <input type="text" id="co_supervisor2_last" name="co_supervisor2_last">
                          <label for="CompsDetails">Approved date(MM/DD/YYYY): </label>
                            <input type="date" id="supervisor2_appro_date" name="supervisor2_appro_date" value="- -" min="2000-01-01" ><br>
                          <label for="CompsDetails">Internal(First/Last): </label>
                            <input type="text" id="internal2_first" name="internal2_first">
                            <input type="text" id="internal2_last" name="internal2_last">
                          <label for="CompsDetails">*Completed date(MM/DD/YYYY): </label>
                            <input type="date" id="supervisor2_complete_date" name="supervisor2_complete_date" value="- -" min="2000-01-01" required><br>

                            <h2>Comp3</h2><label for="CompsDetails">Title: </label>
                              <input type="text" id="comp3_title" name="comp3_title"><br>
                            <label for="CompsDetails">Supervisor(First/Last): </label>
                              <input type="text" id="supervisor3_first" name="supervisor3_first">
                              <input type="text" id="supervisor3_last" name="supervisor3_last">
                            <label for="CompsDetails">Endpoint: </label>
                              <input type="text" id="supervisor3_endpoint" name="supervisor3_endpoint"><br>
                            <label for="CompsDetails">Co-Supervisor(First/Last): </label>
                              <input type="text" id="co_supervisor3_first" name="co_supervisor3_first">
                              <input type="text" id="co_supervisor3_last" name="co_supervisor3_last">
                            <label for="CompsDetails">Approved date(MM/DD/YYYY): </label>
                              <input type="date" id="supervisor3_appro_date" name="supervisor3_appro_date" value="- -" min="2000-01-01" ><br>
                            <label for="CompsDetails">Internal(First/Last): </label>
                              <input type="text" id="internal3_first" name="internal3_first">
                              <input type="text" id="internal3_last" name="internal3_last">
                            <label for="CompsDetails">*Completed date(MM/DD/YYYY): </label>
                              <input type="date" id="supervisor3_complete_date" name="supervisor3_complete_date" value="- -" min="2000-01-01" required><br><br>

                          <label for="CompsDetails">Notes</label><br>
                                  <textarea type="text" id="notes" name="notes" rows="2" cols="86"></textarea><br><br>
                          <label for="CompsDetails">Modification date: </label>
                              <input type="date" id="modi_date" name="modi_date" value="- -" min="2000-01-01" >
                          <label for="CompsDetails">Number Approved:</label>
                              <input type="number" id="num_approved" name="num_approved" min="0">
                          <label for="CompsDetails">All comps completed date: </label>
                              <input type="date" id="complete_date" name="complete_date" value="- -" min="2000-01-01" ><br>


                    <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>
            </div>
            <div class="contentIMG">
                <img id="admissionProfile" width="200" />
                <input type="file" id="myfile" onchange="loadFile(event)" name="myfile"><br><br>
            </div>
            <div class="contentRight">
              <label for="myfile">Import comp info:</label>
                <input type="file" id="comp_file" name="comp_file"><br><br>
              <label for="CompsDetails">SEARCH(Faculty Last Name) </label>
                  <input type="text" id="searcg" name="search"><br><br>
            </div>
        </div>
      </form>
    </body>
    <?php
         require 'footer.php';
    ?>

