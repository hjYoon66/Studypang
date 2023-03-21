<?php
if(isset($_COOKIE['id'])){
   setcookie("id","",time()); //쿠키 삭제
   header("Refresh:1; url=http://localhost/studypang/start.html");
}
?>