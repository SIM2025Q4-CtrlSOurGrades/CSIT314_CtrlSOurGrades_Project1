<?php
// DBConnection.php
// If running in GitHub Actions CI, skip real DB connection
if (getenv('CI') === 'true') {
    $conn = null;
    return;
}

$servername = "localhost";
$username = "root";
$password = "TlouLover2005@";
$dbname = "csit314";

$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
