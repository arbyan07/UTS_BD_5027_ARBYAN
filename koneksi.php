<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "arbyan_uts";

$conn = mysqli_connect($servername,$username,$password,$database);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} 
?>
