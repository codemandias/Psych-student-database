<footer>
    <p> &copy Team D- Psychology Department Grad Student DB
    <p>
</footer>
<?php
//PHP script used to close database at the end of the page
if (isset($dbconnection)) {
    $dbconnection->close();
}
?>