<!DOCTYPE html> 
<html>
<head> 
<meta charset="utf-8">
<link rel="stylesheet" href="login.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
  <h1> 스터디팡 로그인  </h1>  
  <div class ='member'>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <fieldset> 
  <legend> 로그인 </legend>
  <table> 
  <tr> 
     <td> 아이디 </td> <td> <input type="text" name="id"> </td>
  </tr>
  </tr>
     <td> 비밀번호 </td> <td> <input type="password" name="pass"></td>
  </tr>
  <tr> <td colspan=2> 
  <input type="submit" name="submit" value="Login">
  <input type="reset" name="reset" value="Reset">
  </td>
  </tr>
  </table>
  </fieldset>
  </form> 

  <a href="start.html"> 처음으로 </a> 

<?php
 if (isset($_POST['submit'])) {
  
  // id와 pass가 입력되었는지 확인 
  $id = $_POST['id']; // 폼에서 입력된 아이디 
  $password = $_POST['pass']; // 폼에서 입력된 패스워드 

  if (empty($id) || empty($password)) {  // 입력 여부 판단 
    echo "아이디와 비밀번호를 입력하여 주세요... <br>";
  }
  else { // 쿠키 설정 및 데이터베이스 연결 
    setcookie("id", $id); // 쿠키 설정 

    // 데이터베이스 연결 
    $server="localhost";
    $user="root";
    $dbpass="";  // 비밀번호 없음 

    // create connection
    $conn=new mysqli($server, $user, $dbpass);
    // check connection 
    if ($conn->connect_error) {
      die ("connection failed : ".$conn->connect_error);
    }
    $query="use studypang";
    $result=$conn->query($query);

    $query="select u_id,u_password from user where u_id='$id' and u_password='$password'";
    $result=$conn->query($query);
    if($result->num_rows==1){
        header("Refresh:1;url=http://localhost/studypang/start.php");
    }
    else{
        echo "등록된 아이디와 비밀번호가 아닙니다.<br>";
    }
    
    $conn->close(); 
  } // end of else 
 } // isset 
?>
</body>
</html> 