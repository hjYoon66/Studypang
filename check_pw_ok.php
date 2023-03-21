<?php
$server = "localhost";
$user = "root";
$dbpass = "";
$db = "studypang";

$conn = new mysqli($server, $user, $dbpass,$db);
if ($conn->connect_error) {
    die("connection failed : " . $conn->connect_error);
}

$id = $_GET['id'];
$pw = $_POST['pw'];

$query = "select * from user WHERE u_id='$id'";
$res = mysqli_fetch_array(mysqli_query($conn, $query));

if ($_COOKIE['id'] != $id) {
    echo "<script>alert('권한이 없습니다!');";
    echo "window.location.href='../start.html';</script>";
} else {
    if ($res['u_password'] == $pw) {
        echo "<script>alert('새 비밀번호를 입력해주세요!');";
        echo "opener.parent.change_pw(); window.close();</script>";
    } else {
        echo "<script>alert('비밀번호가 틀립니다.');";
        echo "opener.parent.location='mypage.php'; window.close();</script>";
    }
}
?>