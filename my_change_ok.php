<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="tag.css">
    <h1><a href="start.php">Study Pang</a></h1>
</head>

<body>

    <span style=" font-size:1.5em;  color: black;">
        <div style="border: 1px solid white; float: left; width: 30%;" name="total">
            <a href="board.php">전체</a>
        </div>
        <div style="border: 1px solid white; float: left; width: 30%;">
            내 지역
        </div>
        <div style="border: 1px solid white; float: left; width: 30%;">
            관심
        </div>
    </span>

</html>
<?php
if (isset($_COOKIE['id'])) { //로그인 되었다면
?>
<div class='log'>
    <span>
        <?php echo $_COOKIE['id'] . "님, 환영합니다   "; ?>
    </span>
    <a href="logout.php"> 로그아웃</a>
    <a href="mypage.php">마이페이지</a>
</div>
<?php
} else {
?>
<div class="log"><a href="login.php">로그인</a> </div>
<?php
}
?>
<?php
$server = "localhost";
$user = "root";
$dbpass = "";
$db = "studypang";

$conn = new mysqli($server, $user, $dbpass,$db);
if ($conn->connect_error) {
    die("connection failed : " . $conn->connect_error);
}

$login_id = $_COOKIE['id'];
$query = "select * from user where u_id =$login_id";
$result = $conn->query($query);
$res = mysqli_fetch_assoc($result);

$pw = $_POST['pw2'];
$name = $_POST['name2'];
$birth = $_POST['birth2'];
$phone = $_POST['phone2'];
$email = $_POST['email2'];

$pw_pre = $res['u_password'];
$name_pre = $res['u_name'];
$birth_pre = $res['u_birth'];
$phone_pre = $res['u_phone'];
$email_pre = $res['u_email'];

$change_cnt = 0;

if ($pw == "") {
    echo "<script>alert('비밀번호는 비울 수 없습니다!');";
    echo "window.location.href='my_page.php';</script>";
    exit;
} else if ($name == "") {
    echo "<script>alert('이름은 비울 수 없습니다!');";
    echo "window.location.href='my_page.php';</script>";
    exit;
}

if ($pw != $pw_pre) {
    $change_cnt++;
}
if ($name != $name_pre) {
    $change_cnt++;
}
if ($birth != $birth_pre) {
    $change_cnt++;
}
if ($phone != $phone_pre) {
    $change_cnt++;
}
if ($email != $email_pre) {
    $change_cnt++;
}

if ($change_cnt == 0) {
    echo "<script>alert('변경 사항이 없습니다!');";
    echo "window.location.href='mypage.php';</script>";
    exit;
}

$query = "update user set u_password='$pw',u_name='$name',u_birth='$birth',u_email='$email',u_phone='$phone'
    where u_id ='$login_id'";
$res = mysqli_query($conn, $query);

if ($res) {
    echo "<script>alert('내 정보를 [$change_cnt]개 변경했습니다!');";
    echo "window.location.href='mypage.php';</script>";
}
?>
<meta http-equiv="refresh" content="0;url=mypage.php">