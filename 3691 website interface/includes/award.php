<?php
    $parentFile = "Award"; //$parentFile is used to find what file called includes header so header cna be set to file name. DO NOT EDIT
    require 'header.php';
    ?>
<body>
<div class="sidebar">
  <a href="../database-entry.php">Database Entry</a>
  <a href="../includes/admission.php">Admission</a>
  <a class="active" href="../includes/award.php">Awards</a>
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
  					<input type="text" id="nameField" name="firstName" required >
  				<label for="AwardDetails"> </label>
  					<input type="text" id="LnameField" name="lastName" required><br><br>
  				<label for="sInfo"> *ID: </label>
  					<input type="text" id="S_ID" name="studentID" required><br><br>
  				</p>
  				<label for="AwardDetails">*Degree: </label>
  					<input type="radio" id="MSc" name = "degree" value="MSc"> <label for="degreeLabel" required> MSc</label>
  					<input type="radio" id="PhD" name="degree" value="PhD"><label for="degreeLabel" required> PhD(Includes clinical MSc/PhD fast-track)</label><br><br>
  				<label for="AwardDetails">*Program: </label></label>
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
                <h3>Awards, Scholarships</h3>
          <label for="AwardDetails">Award Name: </label>
  					<input type="text" id="AwardField" name="awardname"><br><br>
  				<label for="AwardDetails">*Award Classification: </label>
            <input type="text" id="AwardClass" name="awardclassification" required><br><br>
  				<label for="AwardDetails">*Start date: </label>
            <input type="date" id="start" name="startdate" value="- -" min="2000-01-01" required>
          <label for="AwardDetails">*End date: </label>
            <input type="date" id="end" name="enddate" value="- -" min="2000-01-01" required><br><br>
  				<label for="AwardDetails">*Full value (Per year): </label></label>
            <input type="text" id="value" name="fullvalue" required><br><br>
          <label for="AwardDetails">*Duration (In months): </label></label>
            <input type="text" id="duration" name="duration" required><br><br>
          <label for="AwardDetails">Adjusted value/duration ($0 is honorary): </label></label>
            <input type="text" id="adjustedvalue" name="adjustedvalue"><br><br>
          <label for="AwardDetails">*Amount includes foreign fee?: </label>
    				<input type="radio" id="y" name="foreignfee_yes" value="Yes" required> <label > Yes</label>
    				<input type="radio" id="n" name="foreignfee-no" value="No" required><label > No</label><br><br>
          <label for="AwardDetails">Notes: </label>
            <input type="text" id="NotesField" name="notes"><br><br>
          <hr style="width:310%;">
          <br><br>
          <label for="AwardDetails">Modification date: </label>
            <input type="date" id="modi_date" name="modificationdate" value="- -" min="2000-01-01"><br><br>
          <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>

        </form>
  </div>
 </div>
 <?php
     require 'footer.php';
     ?>
</body>
<?php
     require 'footer.php';
?>
</html>
