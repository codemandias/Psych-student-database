<?php


$firstName= $_POST['admissionFirstName']; 
$lastName = $_POST['admissionLastName'];
$studentID = $_POST['admissionStudentID'];
$studentDegree = $_POST['admissionDegree'];
$program = $_POST['admissionProgram'];
$salutations = $_POST['studentSalutations'];
$supervisorFName = $_POST['admissionSupervisorFName'];
$supervisorLName = $_POST['admissionSupervisorLName'];
$studentEmail = $_POST['admissionStudentEmail'];
$admissionDate = $_POST['admissionDate'];
$foreignStudent = $_POST['foreign'];
$hasMaster = $_POST['hasMaster'];
$holdsMSc = $_POST['holdsMSc'];
$transferDate = $_POST['TDF'];
$transferNo = $_POST['TNF'];
$monthsOff = $_POST['MFF'];
$resRequired = $_POST['resRequired'];
$recentDegree = $_POST['RD'];
$recentSchool = $_POST['RS'];
$admissionGPA = $_POST['admissionGPA'];
$finalGPA = $_POST['finalGPA'];
$scaleField = $_POST['SF'];
$gre = $_POST['gre'];
$grePercentile = $_POST['grePercentile'];
$verbal = $_POST['verbal'];
$verbalPercentile = $_POST['verbalPercentile'];
$quantitative = $_POST['quantitative'];
$quantitativePercentile = $_POST['quantitativePercentile'];
$analytical = $_POST['analytical'];
$analyticalPercentile = $_POST['analyticalPercentile'];
$experimental = $_POST['experimental'];
$experimentalPercentile = $_POST['experimentalPercentile'];
$psychological = $_POST['psychological'];
$psychologicalPercentile = $_POST['psychologicalPercentile'];
$social = $_POST['social'];
$socialPercentile = $_POST['socialPercentile'];
$supervisorChange = $_POST['supervisorChange'];
$noteBox = $_POST['notesBox'];
$modified = $_POST['modified'];
$created = $_POST['created'];
$author = $_POST['author'];

if(empty($firstName) ||  empty($lastName) || empty($studentID) || empty($studentDegree) || empty($supervisorFName) || empty($studentEmail) || empty($admissionDate) || empty($foreignStudent) || empty($holdsMSc) || empty($hasMaster) || empty($transferDate) || empty($recentDegree)){
      header("Location: ../includes/admission.php?fieldsRequired=1");
}
else{
echo "$firstName $lastName $studentID $studentDegree $program $salutations $supervisorFName $supervisorLName $studentEmail $admissionDate 
      $foreignStudent $hasMaster $holdsMSc $transferDate $transferNo $monthsOff $resRequired $recentDegree $recentSchool $admissionGPA $finalGPA $scaleField
      $gre $grePercentile $verbal $verbalPercentile $quantitative $quantitativePercentile $analytical $analyticalPercentile $experimental
      $experimentalPercentile $psychological $psychologicalPercentile $social $socialPercentile $supervisorChange $noteBox $modified $created $author";
}

?>