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

<body>
    <?php
$server = "localhost";
$user = "root";
$dbpass = "";
$db = "studypang";

$conn = new mysqli($server, $user, $dbpass, $db);
if ($conn->connect_error) {
    die("connection failed : " . $conn->connect_error);
}

$query = "select b_num from board";
$num = $_GET['number'];
$query = "select b_title, b_content, b_createAt, b_views, u_id, b_region, b_region2 from board where b_num ='$num'";
$result = $conn->query($query);
$rows = mysqli_fetch_assoc($result);

?>

    <table class="view_table" align=center>
        <tr>
            <td colspan="4" class="view_title">
                <?php echo $rows['b_title'] ?>
            </td>
        </tr>
        <tr>
            <td class="view_id">작성자</td>
            <td class="view_id2">
                <?php echo $rows['u_id'] ?>
            </td>

        </tr>
        <tr>
            <td class="view_region">지역</td>
            <td class="view_region2">
                <?php echo $rows['b_region'] ?>
            </td>
            <td class="view_region_detail">지역 세부정보</td>
            <td class="view_region2_detail">
                <?php echo $rows['b_region2'] ?>
            </td>
        </tr>


        <tr>
            <td colspan="4" class="view_content" valign="top">
                <?php echo $rows['b_content'] ?>
            </td>
        </tr>
    </table>

    <button><a href="board_update2.php?number=<?php echo $num ?>">수정하기</a></button>
    <button><a href="board_delete.php?number=<?php echo $num ?>">삭제하기</a></button>
</body>