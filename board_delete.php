<?php
$server = "localhost";
$user = "root";
$dbpass = ""; 
$db = "studypang";

$conn = new mysqli($server, $user, $dbpass, $db); 
if ($conn->connect_error) {
    die("connection failed : " . $conn->connect_error);
}
$num = $_GET['number'];
$query = "delete from board where b_num='$num'";
$result = $conn->query($query);
header("location:board.php");
?>