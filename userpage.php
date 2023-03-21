<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="studyPang.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li>
                    <?php echo $_COOKIE['id'] . "님, 환영합니다   "; ?>
                </li>
            </ul>
        </nav>
        <div>
            <h1><a href="start.php"> Study Pang</a></h1>
        </div>
        <?php
        if (isset($_COOKIE['id'])) { //로그인 되었다면
        ?>
        <div class='log'>
            <span>
                스터디팡에 오신것을 환영합니다
            </span>
            <div id="g_b">
                <a href="logout.php"> 로그아웃</a>
            </div>
            <div id="g_b">
                <a href="mypage.php">마이페이지</a>
            </div>
        </div>
        <?php
        } else {
        ?>
        <div class="log"><a href="login.php">로그인</a> </div>
        <?php
        }
        ?>


    </header>
    <section id="tripple">
        <div><a href="choice_category.php">
                <p id="fontsize">관심</p>
            </a></div>
        <div><a href="choice_region.php">
                <p id="fontsize">내 지역</p>
            </a></div>
        <div><a href="board.php">
                <p id="fontsize">전체</p>
            </a></div>
    </section>


</html>
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
$num = $_GET['number'];

$query = "select * from user where u_id ='$num'";
$result = $conn->query($query);
$res1 = mysqli_fetch_assoc($result);

$query = "select * from board where u_id ='$num'";
$result = $conn->query($query);
$res = mysqli_fetch_assoc($result);

$query = "select * from board where u_id ='$num' order by b_num desc";
$result = $conn->query($query);
$total = mysqli_num_rows($result);

$query = "select avg(grade) from rating where id='$num'";
$result1 = $conn->query($query);
$res2 = mysqli_fetch_assoc($result1);


?>
<div class=userinfo>
    <table>
        <tr>
            <th>ID</th>
            <td>
                <?= $res1['u_id'] ?>
            </td>
        </tr>
        <tr>
            <th>이름</th>
            <td>
                <?= $res1['u_name'] ?>
            </td>
        </tr>
        <tr>
            <th>생성 스터디</th>
            <td>
                <?php

                while ($rows = mysqli_fetch_assoc($result)) { //DB에 저장된 데이터 수 (열 기준)
                    if ($total % 2 == 0) {
                ?>
                <?php } else {
                ?>
                <?php } ?>
                <a href="view.php?number=<?php echo $rows['b_num'] ?>">
                    <?php echo $rows['b_title'] . "<br>" ?>
                    <?php
                    $total--;
                }
                ?>
            </td>
        </tr>

        <tr>
            <th>별점</th>
            <td>
                <?= $res2['avg(grade)'] ?>
            </td>
        </tr>

        <tr>
            <td>
                <button><a href="star.php?number=<?php echo $num ?>">별점주기</a></button>
            </td>

        </tr>

    </table>
</div>