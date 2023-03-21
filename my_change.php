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
?>
<script>
    function check_pw() {
        var id = document.getElementById("id").innerHTML;
        var url = "check_pw.php?id=" + id;
        window.open(url, "chkpw", 'width=500,height=800, scrollbars=no, resizable=no');
    }
    function change_pw() {
        document.getElementById("pw").disabled = false;
        document.getElementById("pw_button").value = "확정";
        document.getElementById("pw_button").style.color = "hotpink";
        document.getElementById("pw_button").setAttribute("onclick", "decide_pw()");
    }
    function decide_pw() {
        document.getElementById("submit").disabled = false;
        document.getElementById("pw2").value = document.getElementById("pw").value;
        document.getElementById("pw").disabled = true;
        document.getElementById("pw_button").disabled = true;
        document.getElementById("pw_button").value = "확정됨";
        document.getElementById("pw_button").style.color = "#ccc";
    }

    function change_name() {
        document.getElementById("name").disabled = false;
        document.getElementById("name_button").value = "확정";
        document.getElementById("name_button").style.color = "hotpink";
        document.getElementById("name_button").setAttribute("onclick", "decide_name()");
    }
    function decide_name() {
        document.getElementById("submit").disabled = false;
        document.getElementById("name2").value = document.getElementById("name").value;
        document.getElementById("name").disabled = true;
        document.getElementById("name_button").disabled = true;
        document.getElementById("name_button").value = "확정됨";
        document.getElementById("name_button").style.color = "#ccc";
    }

    function change_birth() {
        document.getElementById("birth").disabled = false;
        document.getElementById("birth_button").value = "확정";
        document.getElementById("birth_button").style.color = "hotpink";
        document.getElementById("birth_button").setAttribute("onclick", "decide_birth()");
    }
    function decide_birth() {
        document.getElementById("submit").disabled = false;
        document.getElementById("birth2").value = document.getElementById("birth").value;
        document.getElementById("birth").disabled = true;
        document.getElementById("birth_button").disabled = true;
        document.getElementById("birth_button").value = "확정됨";
        document.getElementById("birth_button").style.color = "#ccc";
    }

    function change_phone() {
        document.getElementById("phone").disabled = false;
        document.getElementById("phone_button").value = "확정";
        document.getElementById("phone_button").style.color = "hotpink";
        document.getElementById("phone_button").setAttribute("onclick", "decide_phone()");
    }
    function decide_phone() {
        document.getElementById("submit").disabled = false;
        document.getElementById("phone2").value = document.getElementById("phone").value;
        document.getElementById("phone").disabled = true;
        document.getElementById("phone_button").disabled = true;
        document.getElementById("phone_button").value = "확정됨";
        document.getElementById("phone_button").style.color = "#ccc";
    }

    function change_email() {
        document.getElementById("email").disabled = false;
        document.getElementById("email_button").value = "확정";
        document.getElementById("email_button").style.color = "hotpink";
        document.getElementById("email_button").setAttribute("onclick", "decide_email()");
    }
    function decide_email() {
        document.getElementById("submit").disabled = false;
        document.getElementById("email2").value = document.getElementById("email").value;
        document.getElementById("email").disabled = true;
        document.getElementById("email_button").disabled = true;
        document.getElementById("email_button").value = "확정됨";
        document.getElementById("email_button").style.color = "#ccc";
    }
</script>
<div id="j">
    <div class=userch>
        <form method=post action="my_change_ok.php">
            <table>
                <tr>
                    <th>ID</th>
                    <td><span id=id>
                            <?= $res['u_id'] ?>
                        </span></td>
                </tr>
                <tr>
                    <th>PW</th>
                    <td><input type=password name=pw id=pw disabled placeholder="필수 입력 사항입니다."
                            value="<?= $res['u_password'] ?>">
                        <input type=button id=pw_button value="변경" onclick="check_pw();">
                    </td>
                    <input type=hidden name=pw2 id=pw2 value="<?= $res['u_password'] ?>">
                </tr>
                <tr>
                    <th>이름</th>
                    <td><input type=text name=name id=name disabled placeholder="필수 입력 사항입니다."
                            value="<?= $res['u_name'] ?>">
                        <input type=button id=name_button value="변경" onclick="change_name();">
                    </td>
                    <input type=hidden name=name2 id=name2 value="<?= $res['u_name'] ?>">
                </tr>
                <tr>
                    <th>연락처</th>
                    <td><input type="text" name=phone id=phone disabled value="<?= $res['u_phone'] ?>">
                        <input type=button id=phone_button value="변경" onclick="change_phone();">
                    </td>
                    <input type=hidden name=phone2 id=phone2 value="<?= $res['u_phone'] ?>">
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="text" name=email id=email disabled value="<?= $res['u_email'] ?>">
                        <input type=button id=email_button value="변경" onclick="change_email();">
                    </td>
                    <input type=hidden name=email2 id=email2 value="<?= $res['u_email'] ?>">
                </tr>
                <tr>
                    <th>생년월일</th>
                    <td><input type="text" name=birth id=birth disabled value="<?= $res['u_birth'] ?>">
                        <input type=button id=birth_button value="변경" onclick="change_birth();">
                    </td>
                    <input type=hidden name=birth2 id=birth2 value="<?= $res['u_birth'] ?>">
                </tr>
            </table>
            <input disabled id=submit type=submit value="수정하기">
        </form>
    </div>
</div>