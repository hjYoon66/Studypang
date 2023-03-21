<script>
    function removeCheck() {
        if (confirm("정말 삭제하시겠습니까??") == true) { //확인
            document.removefrm.submit();
        } else { //취소
            return;
        }
    }
</script>
<?php
echo ("<script language='javascript'>removeCheck();</script>");
$server = "localhost";
$user = "root";
$dbpass = "";
$db = "studypang";

$conn = new mysqli($server, $user, $dbpass,$db);
if ($conn->connect_error) {
    die("connection failed : " . $conn->connect_error);
}

$login_id = $_COOKIE['id'];
$query = "delete from user where u_id='$login_id'";
$result = $conn->query($query);

mysqli_query($conn, $query);

setcookie('id', $login_id, time() - 3600);
echo "
    <script type=\"text/javascript\">
        alert(\"정상처리 되었습니다.\");
        location.href = \"http://localhost/studypang/start.html\";
    </script>
";
?>