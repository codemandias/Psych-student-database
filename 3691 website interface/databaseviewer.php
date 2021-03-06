<?php
$parentFile = "Database Viewer"; //$parentFile is used to find what file called includes header so header cna be set to file name. DO NOT EDIT
$pageDir = basename(__DIR__);
require 'includes/header.php';
?>

<body>
    <div class="sidebar">
      <form>
        <input type="submit" name="show_all_student" value="Show all students"/>
        <input type="submit" name="show_by_semmester" value="Show by semester"/>
        <input type="submit" name="show_by_program" value="Show by program"/>
        <input type="submit" name="show_by_degree" value="Show by degree"/>
      </form>
    </div>
    <div class="contentTable">
        <input type="text" id="search" name="search" placeholder="search" required >
        <table class="mytable">
            <tr>
                <th>Student Name</th>
                <th>Student Number</th>
                <th>Degree</th>
                <th>Program</th>
            </tr>
            <?php
            $studentsQuery = "SELECT * FROM `student`";
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
