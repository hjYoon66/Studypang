<?php
$u_id = $_POST["u_id"];
$u_password = $_POST['u_password'];
$u_name = $_POST['u_name'];
$u_birth = $_POST['u_birth'];
$u_email = $_POST['u_email'];
$u_phone = $_POST['u_phone'];

$server = "localhost";
$user = "root";
$dbpass = "";
$db = "studypang";

$conn = new mysqli($server, $user, $dbpass,$db);
if ($conn->connect_error) {
  die("connection failed : " . $conn->connect_error);
}
$query = "insert into user (u_id,u_password,u_name,u_birth,u_email,u_phone) values ('$u_id','$u_password','$u_name','$u_birth','$u_email','$u_phone');";
$result = $conn->query($query);
header("location:login.php");

?>