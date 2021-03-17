<?php
$parentFile = "Calculations"; //$parentFile is used to find what file called includes header so header cna be set to file name. DO NOT EDIT
$pageDir = basename(__DIR__);
require 'includes/header.php';
?>
<body>

<div class="sidebar">
    <a class="active" href="#Database-Entry">Scholarship</a>
    <a href=''>Faculty</a>
    <a href=''>Misc</a>
</div>

<div class="content">
<?php
    /*
    ASSUMPTIONS: 
        * NSGS is the only internal scholarship
        * Students only can have one external and intern scholarship

    PLAN:
        * Check if student has any external awards
            *if yes add these to students total sum
                *Check if student has any internal awards
                    *if yes subtract check if internal is less than or equal to max-external
                        *if yes add internal to total sum
                        *if no add adjust internal = Internal - (External+Internal - Max)
                            *then if adjusted value is above 0 add adjusted value to total sum 
                            *if adjusted value is below 0 then do nothing
            *if no skip all calculations and 0 FGS funding
        
    */

    //setting constant values for calulations
    $mastersMax = 20000;
    $phdMax = 30000;
    $departmentMin = 21000;
    $departmentMax = 23000;

    //Masters student 1 example
    //figure out way to sort into external and internal awards
    $studentDegree = "Masters";
    $externalName = "SSHRC";
    $externalValue = 17500;
    $internalName = "NSGS";
    $internalValue = 10000;
    $studentYear = 0;

    //PhD student case 1 example
    //figure out way to sort into external and internal awards
    // $studentDegree = "PhD";
    // $externalName = "NSERC PGS Doctoral";
    // $externalValue = 21000;
    // $internalName = "";
    // $internalValue = 0;
    // $studentYear = 1;

    //PhD student case 2 example
    //figure out way to sort into external and internal awards
    // $studentDegree = "PhD";
    // $externalName = "NSERC PGS Doctoral";
    // $externalValue = 21000;
    // $internalName = "NSGS";
    // $internalValue = 15000;
    // $studentYear = 1;

    // //PhD student case 3 example
    // //figure out way to sort into external and internal awards
    // $studentDegree = "PhD";
    // $externalName = "CIHR";
    // $externalValue = 35000;
    // $internalName = "NSGS";
    // $internalValue = 10000;
    // $studentYear = 1;

    //PhD student case 4 example
    //figure out way to sort into external and internal awards
    // $studentDegree = "PhD";
    // $externalName = "";
    // $externalValue = 0;
    // $internalName = "";
    // $internalValue = 0;
    // $studentYear = 3;

    $fgsValue = 0;
    $toppedUpValue = 0;

    $fgsValue = fgsCalculation($studentDegree, $externalValue, $internalValue);
    echo  "FGS would give student $" . $fgsValue;
    
    $toppedUpValue = topUpCalculation($departmentMin, $departmentMax, $fgsValue, $studentDegree, $studentYear);
    echo "<br>Total topped up value is $" . $toppedUpValue;

    function fgsCalculation($studentDegree, $externalValue, $internalValue){
        $fgsGives = 0;
        //masters student
        if(strcasecmp($studentDegree, "Masters") == 0){
            $maxVal = 20000;
        }
        //phd student
        else if(strcasecmp($studentDegree, "PhD") == 0){
            $maxVal = 30000;
        }
        //unknown degree
        else{
            $maxVal = 0;
        }
        //student has external award
        if($externalValue > 0){
            $fgsGives += $externalValue;

            //studnet has internal award
            if($internalValue > 0){
                //adjusting internal award
                if(($maxVal-$externalValue) >= $internalValue){
                    $fgsGives += $internalValue;
                }
                else{
                    $internalAdjusted = $internalValue;
                    $internalAdjusted -= ($externalValue + $internalValue - $maxVal);
                    
                    //if value is less than 0 student is already over maximum degree amount
                    if($internalAdjusted > 0){
                        $fgsGives += $internalAdjusted;
                    }
                }
            }
        }
        //student does not have external award
        else{
            //check if student has internal awards
            if($internalValue > 0){

                //checking internal award is less than or equal to degree max
                if($internalValue <= $maxVal){
                    $fgsGives += $internalValue;
                }
                else{
                    $fgsGives += $maxVal;
                }
            }
        }
        return $fgsGives;
    }

    function topUpCalculation($departmentMin, $departmentMax, $fgsValue, $studentDegree, $studentYear){
        if($fgsValue > $departmentMax){
            return $fgsValue;
        }
        else{
            //phd student
            if(strcasecmp($studentDegree, "PhD") == 0){
                if($studentYear <= 3){
                    $departmentMin += 300*$studentYear;
                }
            }
            $topUp = round((($fgsValue / $departmentMin) * ($departmentMax - $departmentMin) + ($departmentMin - $fgsGives)));
            return $topUp;
        }
    }
?>
</div>
<?php
require 'includes/footer.php';
?>
</body>
