<?php
//Database connection script
//Username and Password will need to be modified to meet local setup
$hostname = "outreach.cs.dal.ca";
$username = "psycdatabase";
$password = "akee7veef3oej1Ze";
$dbname = "devpsycdatabase";

//creating new mysqli database object
$dbconnection = new mysqli($hostname, $username, $password, $dbname);

if ($dbconnection->connect_error) {
    echo "Failed to Connect<br>" . $dbconnection->connect_error;
} else {
    //echo "DB Connected! (Remove after development)";
    //Connected statement can be un commented for debugging
}
