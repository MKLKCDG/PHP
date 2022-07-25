<?php
session_start();
  if(!isset($_SESSION['username'])) {
    header("Location: anasayfa1.php");
   }
?>
<?php
session_start();
require("database.php");
if(isset($_POST['sifredegistir'])) {
    echo "burda";
    $id = $_SESSION['id'];
    $a=hash("sha256",$_POST['sifre']);
    if (hash( "sha256" ,$_POST['sifre']) == hash("sha256" ,$_POST['sifretekrar'])) {
        $pass=$a;
        require("database.php");
        $update = "UPDATE users SET pass='$pass' WHERE id='$id'";
        $abc= $db->prepare($update);
        $abc->execute();
        if ($abc){
            echo '<script>
                alert("Sifre Degistirildi");
                window.location.href="anasayfa.php";
                </script>';
        }
        else{
            echo '<script>
                alert("Sifreler Uyusmuyor");
                window.location.href="sifredegistir.php";
                </script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sifredegistir</title>
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
        <label for="sifre"><b>Şifre:</b></label>
        <input type="text" name="sifre" id="sifre" required><br>
        <label for="sifretekrar"><b>Şifre Tekrar:</b></label>
        <input type="text" name="sifretekrar" id="sifretekrar" required><br>
        <button type="submit" name="sifredegistir" class="registerbtn">Şifreyi Değiştir</button><br>
    </div>
   </form>
</body>
</html>