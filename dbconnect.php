<?php
$servername = "localhost";
$dbname = "cms";
$username = "root";
$password = "";

// Δημιουργία σύνδεσης
$conn = new mysqli($servername, $username, $password, $dbname);

mysqli_set_charset($conn, "utf8");

// Set the character set to utf8
$conn->query("SET NAMES 'utf8'");


// Έλεγχος σύνδεσης
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>





