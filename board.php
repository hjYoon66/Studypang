<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="studyPang.css">
    <link rel="stylesheet" href="board.css">
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

    $query = "select * from board order by b_num desc";
    $result = $conn->query($query);
    $total = mysqli_num_rows($result);


    ?>
    <h2 align=center>스터디 모집 게시판</h2>
    <div id="j">
        <table align=center>
            <thead align="center">
                <tr>
                    <td width="50" align="center">번호</td>
                    <td width="500" align="center">제목</td>
                    <td width="100" align="center">작성자</td>
                    <td width="200" align="center">날짜</td>
                    <td width="50" align="center">조회수</td>
                </tr>
            </thead>
    </div>
    <tbody>
        <?php

            while ($rows = mysqli_fetch_assoc($result)) {
                if ($total % 2 == 0) {
            ?>
        <tr class="even">
            <?php } else {
                ?>
        <tr>
            <?php } ?>
            <td width="50" align="center">
                <?php echo $total ?>
            </td>
            <td width="500" align="center">
                <a href="view.php?number=<?php echo $rows['b_num'] ?>">
                    <?php echo $rows['b_title'] ?>
            </td>
            <td width="100" align="center">
                <a href="userpage.php?number=<?php echo $rows['u_id'] ?>">
                    <?php echo $rows['u_id'] ?>
            </td>
            <td width="200" align="center">
                <?php echo $rows['b_createAt'] ?>
            </td>
            <td width="50" align="center">
                <?php echo $rows['b_views'] ?>
            </td>
        </tr>
        <?php
                $total--;
            }
            ?>
    </tbody>
    </table>
    <div id="butn">
        <button><a href="board_create.php">
                스터디 생성
            </a>
        </button>
    </div>
</body>

</html>