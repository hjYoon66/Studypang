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
                <li><a href="login.php">로그인</a></li>
                <li><a href="signup.html">회원가입</a></li>
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

$conn = new mysqli($server, $user, $dbpass, $db);
if ($conn->connect_error) {
    die("connection failed : " . $conn->connect_error);
}
$num = $_GET['number'];
$query = "select * from board where b_num='$num'";
$result = $conn->query($query);

?>

<body>
    <div id="board_id">
        <h3>스터디 수정</h3>
        <div id="write_area">
            <form method="post" action="board_update_ok.php?number=<?php echo $num ?>">
                <div class="title">
                    제목
                    <span><input type="text" name="title"></span>
                </div>
                <div class="field region">
                    지역
                    <div>
                        <div id="choice_radio">
                            <select name="region">
                                <option value="서울특별시">서울</option>
                                <option value="경기">경기</option>
                                <option value="인천">인천</option>
                                <option value="대전">대전</option>
                                <option value="대구">대구</option>
                                <option value="울산">울산</option>
                                <option value="광주">광주</option>
                                <option value="부산">부산</option>
                                <option value="충청도">강원도</option>
                                <option value="경상도">경상도</option>
                                <option value="전라도">전라도</option>
                                <option value="제주도">제주도</option>
                            </select>
                            <input type="text" name="region2" placeholder="상세 지역">
                        </div>
                        <br>
                        <div class="category">
                            카테고리
                            <div>
                                <div id="category_radio">
                                    <select name="category">
                                        <option value="IT">IT</option>
                                        <option value="운동">운동</option>
                                        <option value="자격증">자격증</option>
                                        <option value="토익">토익</option>
                                        <option value="자기계발">자기계발</option>
                                    </select>
                                </div>
                                <br>
                                <div class="field">
                                    <td>내용</td>
                                    <textarea name="content" rows=30 cols=80 placeholder="내용을 입력하세요"
                                        required></textarea>
                                </div>

                                <div id="submit">
                                    <input type="submit" value="수정하기" name="submit">
                                </div>
            </form>
        </div>
    </div>
</body>

</html>