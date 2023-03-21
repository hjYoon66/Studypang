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
            <li><?php echo $_COOKIE['id'] . "님, 환영합니다   "; ?></li>
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
            <div id = "g_b">
            <a href="logout.php"> 로그아웃</a>
            </div>
            <div id = "g_b">
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

    <?php

?>
    <div id="j">
    <option value="none">==선택==</option>
    
    <div id="choice_categoty">
        <form action="choice_category2.php" method="post" name="category">
                    <div id="category_radio">
                        <select name="category">
                            <option value="IT">IT</option>
                            <option value="운동">운동</option>
                            <option value="자격증">자격증</option>
                            <option value="토익">토익</option>
                            <option value="자기계발">자기계발</option>
                        </select>
                    </div>
                    <input type="submit" value="확인" id="submit">
        </form>
    </div>
    </div>