
<?php
$servername = "127.0.0.1"; // localhost
$username = "root"; 
$password = ""; 
$dbname = "Cabinet";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
} catch (Exception $e) {
    die("Connection failed: " . $e->getMessage());
}
?>