<?php
$dbservername =   'localhost';
$dbusername   =   'root';
$dbpassword   =   '';
$dbname     =   "putovanja";
$conn = new mysqli($dbservername, $dbusername, $dbpassword, "$dbname");
if ($conn->connect_errno) { 
    die("<script>alert('GREŠKA: Ne može se pristupiti bazi. " . $conn->connect_error . "')</script>");
}
