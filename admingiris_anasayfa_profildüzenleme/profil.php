<?php
session_start();
  if(!isset($_SESSION['username'])) {
    header("Location: anasayfa1.php");
   }
?>
<?php 
 // session_start();
  require("database.php");
  if(isset($_POST['duzenle'])){
    $id=$_SESSION['id'];
    $adsoyad=$_POST['name'];
    $username=$_POST['username'];
    $biyografi=$_POST['biyografi'];
    $update="UPDATE users SET adsoyad='$adsoyad', username='$username',biyografi='$biyografi' WHERE id='$id'";
    $asd=$db->prepare($update);
    $asd->execute();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h2>Başlık</h2>
   <div style = "display: flex; justify-content:flex-end; margin-top: 0px">
    <button><a href="anasayfa.php">Anasayfa</a></button>
    <button><a href="logaut.php">Çıkış Yap</a></button>
   </div>
   <hr>
   <form action="" method="post" align="center" enctype="multipart/form-data">
  <div class="container">
    <h3>Admin panele hoş geldiniz</h3>
    <label for="name"><b>Adı Soyadı:</b></label>
    <input type="text"  name="name" id="name" required><br>
    <label for="username"><b>Kullanıcı adı:</b></label>
    <input type="text" name="username" id="username"><br>
    <label for="biyografi"><b>Biyografi:</b></label>
    <input type="text" name="biyografi" id="biyografi"><br>
    <button type="submit" name="duzenle" class="registerbtn">Profili Düzenle</button><br>
    <a href="sifredegistir.php">Şifre Değiştir</a>
  </div>

</body>
</html>