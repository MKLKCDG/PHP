<?php
session_start();
  if(!isset($_SESSION['username'])) {
   header("Location: anasayfa1.php");
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>anasayfa</title>
</head>
<body>
<h2>Başlık</h2>

   <div style = "display: flex; justify-content:flex-end; margin-top: 0px">
    <button><a href="profil.php">Profil</a></button>
    <button><a href="logaut.php">Çıkkış Yap</a></button>
   </div>
   <h2>Anasayfa</h2>
</body>
</html>