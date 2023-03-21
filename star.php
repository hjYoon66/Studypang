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

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./star.css">
</head>

<body>
    <?php $num = $_GET["number"]; ?>
    <form id="myform" method="post" action="star_check.php">
        <fieldset>
            <legend>별점 선택</legend>
            <input type="radio" name="rating" value="5" id=rate1><label for="rate1">⭐</label>
            <input type="radio" name="rating" value="4" id=rate2><label for="rate2">⭐</label>
            <input type="radio" name="rating" value="3" id=rate3><label for="rate3">⭐</label>
            <input type="radio" name="rating" value="2" id=rate4><label for="rate4">⭐</label>
            <input type="radio" name="rating" value="1" id=rate5><label for="rate5">⭐</label>
            <input type="hidden" name="num" value="<?php echo $num; ?>">
            <input type="submit" value="확정" name="submit_grade">
        </fieldset>
    </form>

</body>

</html>