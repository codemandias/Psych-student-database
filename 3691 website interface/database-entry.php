<?php
    $parentFile = "Database Entry"; //$parentFile is used to find what file called includes header so header cna be set to file name. DO NOT EDIT
    $pageDir = basename(__DIR__);
    require 'includes/header.php';
    ?>
<body>

<div class="sidebar">
  <a class="active" href="#Database-Entry">Database Entry</a>
  <a href='../3691 website interface/includes/admission.php'>Admission</a>
  <a href="../3691 website interface/includes/award.php">Awards</a>
  <a href="#Comps">Comps</a>
  <a href="#Publications">Publications</a>
  <a href="#Presentation">Presentation</a>
  <a href="#Progress">Progress</a>
  <a href="#Status">Status</a>
</div>

<div id="content">
  <div class = "contentLeft">
  <h3>Student Information</h3>
  <form method="get" action="">
  				<p id = "row">
  				<label for="sInfo">*Student(First/Last): </label>
  					<input type="text" id="nameField" name="firstName">
  				<label for="studentDetails"> </label>
  					<input type="text" id="LnameField" name="lastName"><br><br>
  				</p>
				<p id = "row">
  				<label for="sInfo"> *ID: </label>
  					<input type="text" id="S_ID" name="studentID"><br><br>
  				</p>
  				<label for="studentDetails">*Degree: </label>
  					<input type="radio" id="MSc" name = "degree" value="MSc"> <label for="degreeLabel"> MSc</label>
  					<input type="radio" id="PhD" name="degree" value="PhD"><label for="degreeLabel"> PhD(Includes clinical MSc/PhD fast-track)</label><br><br>
  				<label for="studentDetails">*Program: </label></label>
  					<input type="radio" id="clinical" name = "program" value="clinical"> <label for="programLabel"> Clinical</label>
  					<input type="radio" id="neuro" name="program" value="neuroscience"><label for="programLabel"> Neuroscience</label>
  					<input type="radio" id="psych" name="program" value="psychology"><label for="programLabel"> Psychology</label><br><br>
  				<label for="studentSupervisor">*Supervisor(F/L): </label>
  					<select name="studentSlutations" id="salutations">
    					<option value="mr">Mr.</option>
    					<option value="miss">Miss</option>
  					</select>
  				<label for="supervisorFName"> </label><input type="text" id="emailField" name="email">
  				<label for="supervisorLName"> </label><input type="text" id="emailField" name="email"><br><br>
  				<label for="studentEmail">*Student Email: </label><input type="text" id="emailField" name="email"><br><br>
                <hr style="width:310%;">
  </form>
  </div>
 </div>
 <?php
     require 'includes/footer.php';
     ?>
</body>
</html>
