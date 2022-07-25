<?php
    session_start();
    require("database.php");
  
  //echo "burda";
  if(isset($_POST['username']) && isset($_POST['pass'])){
    $q=$db->prepare("SELECT * FROM  users WHERE username=:username AND pass=:pass" );
    //echo "burda";
    $q->execute(array(
      "username" => $_POST['username'],
      "pass"=>hash("sha256", $_POST['pass'])
    ));
    //echo "burda";
    $result=$q->fetch(); 
    print_r($result); 
    echo $result;
    if(isset($result[0])){
        $_SESSION['username']=$_POST['username'];
        $_SESSION['id']=$result['id'];
       //echo "okudu";
      header("Location:anasayfa.php");
    }else{
      echo 'kullanıcı yok';
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giris</title>
</head>
<body>
<h2>Başlık</h2>
  <form action="" method="post" align="center" enctype="multipart/form-data">
    <h1 style="text-align: center">Giriş Yap</h1>
    <label for="username"><b>Kullanıcı Adı:</b></label>
    <input type="text"  name="username" id="username" required><br>
    <label for="pass"><b>Şifre:</b></label>
    <input type="password"  name="pass" id="pass" required><br>
    <button type="submit" >Giriş Yap</button>
   
  </form>
</body>
</html>