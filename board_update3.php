<?php
if (isset($_POST['submit'])) {
    $id = $_COOKIE['id'];
    $title = $_POST['title']; //Title
    $content = $_POST['content']; //Content
    $region = $_POST['region'];
    $region2 = $_POST['region2'];
    $category = $_POST['category'];
    $date = date('Y-m-d H:i:s'); //Date

    if (empty($title) || empty($content)) { // 입력 여부 판단 
        echo "작성되지 않았습니다 <br>";
    } else {
        $server = "localhost";
        $user = "root";
        $dbpass = "";
        $db = "studypang";

        $conn = new mysqli($server, $user, $dbpass, $db);
        if ($conn->connect_error) {
            die("connection failed : " . $conn->connect_error);
        }
        $num = $_GET['number'];
        $query = "update board set b_title='$title',b_content='$content',
        u_id='$id',b_createAt='$date',b_region='$region',b_region2='$region2',b_category='$category'
        where b_num='$num'";
        $result = $conn->query($query);
        $conn->close();
    }
}