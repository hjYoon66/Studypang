<?php
if (isset($_POST['submit'])) {
    $id = $_COOKIE['id'];
    $title = $_POST['title']; //Title
    $content = $_POST['content']; //Content
    $region = $_POST['region'];
    $region2 = $_POST['region2'];
    $category = $_POST['category'];
    $date = date('Y-m-d H:i:s'); //Date

    if (empty($title) || empty($content)) {
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
        $query = "insert into board (b_num, b_title, b_content, u_id, b_createAt, b_views,b_region,b_region2,b_category) 
                values(null,'$title', '$content', '$id', '$date',0, '$region', '$region2','$category')";
        $result = $conn->query($query);
        header("location:board.php");
        $conn->close();
    } 
} 
