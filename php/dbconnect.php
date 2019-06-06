<?php
$servername = "localhost";
$username   = "id9107981_tanas"; //ht
$password   = "tanas"; //freeforht
$dbname     = "id9107981_tanas";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>