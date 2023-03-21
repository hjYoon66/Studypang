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
            <h1><a href="start.html"> Study Pang</a></h1>
        </div>
        <?php
        if (isset($_COOKIE['id'])) { //로그인 되었다면
        ?>
        <div class='log'>
            <span>
                스터디팡에 오신 것을 환영합니다
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

$query = "select * from user where u_id ='$login_id'";
$result = $conn->query($query);
$res = mysqli_fetch_assoc($result);

$query = "select * from board where u_id ='$login_id' order by b_num desc";
$result = $conn->query($query);
$total = mysqli_num_rows($result);
?>
<div id="j">
    <div class=userinfo>
        <table>
            <tr>
                <th>ID</th>
                <td>
                    <?= $res['u_id'] ?>
                </td>
            </tr>
            <tr>
                <th>이름</th>
                <td>
                    <?= $res['u_name'] ?>
                </td>
            </tr>
            <tr>
                <th>연락처</th>
                <td>
                    <?= $res['u_phone'] ?>
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    <?= $res['u_email'] ?>
                </td>
            </tr>
            <tr>
                <th>생년월일</th>
                <td>
                    <?= $res['u_birth'] ?>
                </td>
            </tr>
            <tr>
                <th>생성스터디</th>
                <td>

                    <?php

                    while ($rows = mysqli_fetch_assoc($result)) { //DB에 저장된 데이터 수 (열 기준)
                        if ($total % 2 == 0) {
                    ?>

                    <?php } else {
                    ?>
                    <?php } ?>
                    <a href="board_update.php?number=<?php echo $rows['b_num'] ?>">
                        <?php echo $rows['b_title'] . "<br>" ?>
                        <?php
                        $total--;
                    }
                        ?>
                </td>
            </tr>

        </table>
    </div>
</div>
<div class=userch>
    <button><a href="my_change.php">회원 정보 수정</a></button>
    <button><a href="my_delete.php">회원 탈퇴</a></button>
</div>

</html>