<?php
$parentFile = "Database Viewer"; //$parentFile is used to find what file called includes header so header cna be set to file name. DO NOT EDIT
$pageDir = basename(__DIR__);
require 'includes/header.php';
?>

<body>
    <div class="sidebar">
        <form method="post">
            <input type="submit" name="show_all_student" value="Show all students" />
            <input type="submit" name="show_by_semmester" value="Show by semester" />
            <input type="submit" name="show_by_program" value="Show by program" />
            <input type="submit" name="show_by_degree" value="Show by degree" />
        </form>
    </div>
    <div class="contentTable">
        <input type="text" id="search" name="search" placeholder="search" required>
        <table class="mytable">
            <tr>
                <th>Student Name</th>
                <th>Student Number</th>
                <th>Degree</th>
                <th>Program</th>
            </tr>
            <?php
            //if show all student button is pressed display all students
            if (isset($_POST["show_all_student"])) {
                $studentsQuery = "SELECT * FROM `student` ORDER BY `student`.`last_name`";
            }
            //else if show by semester is pressed display current students
            else if (isset($_POST["Show by semester"])) {
                "SELECT * FROM `student` 
				 INNER JOIN `student_status` 
                 ON `student`.`student_id` =  `student_status`.`student_id` 
				 WHERE `student_status`.`program_status_today` = 'Current' ";
            }
            //else if show by program is pressed organize students by program name
            else if (isset($_POST["show_by_program"])) {
                $studentsQuery = "SELECT * FROM `student` ORDER BY `student`.`program_type`";
            }
            //else if show by degree is pressed organize students by degree name
            else if (isset($_POST["show_by_degree"])) {
                $studentsQuery = "SELECT * FROM `student` ORDER BY `student`.`degree_type`";
            }
            //if no button has been pressed just display all students
            else {
                $studentsQuery = "SELECT * FROM `student`";
            }
            //query result
            $result = $dbconnection->query($studentsQuery);

            //checking result is valid
            if ($result) {
                //if result rows is zero display no results message
                if ($result->num_rows == 0) {
                    echo "<p>Sorry, no results found</p>";
                }

                //else it will display db results
                else {
                    //while loop gets the results of the SQL query
                    while ($row = $result->fetch_assoc()) {
                        $studentName = $row['first_name'] . " " . $row['last_name'];
                        $studentId = $row['student_id'];
                        $studentDegree = $row['degree_type'];
                        $studentProgram = $row['program_type'];
                        echo "<tr>
                        <td>$studentName</td>
                        <td>$studentId</td>
                        <td>$studentDegree</td>
                        <td>$studentProgram</td>
                        </tr>";
                    }
                }
            }
            ?>
        </table>
    </div>
    <?php
    require 'includes/footer.php';
    ?>
</body>

</html>