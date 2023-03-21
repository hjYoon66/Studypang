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


    <div id="j">
        <option value="none">==선택==</option>

        <div id="choice_radio">
            <form action="choice_region2.php" method="post" name="region">
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
                <input type="submit" value="확인" id="submit">
            </form>
        </div>