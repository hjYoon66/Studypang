<?php
$server = "localhost";
$user = "root";
$dbpass = "";
$db = "studypang";

$conn = new mysqli($server, $user, $dbpass,$db);
if ($conn->connect_error) {
    die("connection failed : " . $conn->connect_error);
}

$id = $_GET["id"];
?>

<body>
    <div class=top>
        <h2>비밀번호 변경</h2>
    </div>
    <div class=middle>
        <form method="post" action="check_pw_ok.php?id=<?= $id ?>" autocomplete="off">
            <p style="font-size:25px;">현재 비밀번호를 입력하세요.</p>
            <p><input style="text-align:center;" placeholder="Password" class=textform type=password name=pw></p>
            <p><input type=submit value=확인></p>
        </form>
    </div>
</body>