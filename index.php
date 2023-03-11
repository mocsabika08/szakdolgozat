<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <title>Arkanoid klón</title>
  <link type='text/css' rel='stylesheet' href='style.css'>
</head>

<body>
  <div class='keret'>
    <div class='belso felso'>Arkanoid klón</div>
    <div class='belso bal'>
        <a href='?p=main'>Főmenü</a>
        <?php
          include "php/insert.php";
          $isLoginOK = false;
          if (isset($_COOKIE['username']) && isset($_COOKIE['password']))
          {
              $username = $_COOKIE['username'];
              $password = $_COOKIE['password'];
      
              $sql = "SELECT * FROM `player` WHERE `username` = '$username'";
              $result = mysqli_query($conn, $sql);
              $num_rows = mysqli_num_rows($result);
      
              if ($num_rows > 0)
              {
                  $sql = "SELECT * FROM `player` WHERE `username` = '$username' AND `password` = '$password'";
                  $result = mysqli_query($conn, $sql);
                  $num_rows = mysqli_num_rows($result);
                  if ($num_rows > 0)
                      $isLoginOK = true;
                  else
                  {
                      setcookie("username", "", time()-3600);
                      setcookie("password", "", time()-3600);
                      print "<script>alert('Hibás jelszó!')</script>";
                  }
              }
              else
              {
                  $conn -> query("INSERT INTO `player` (`username`, `password`)
                                  VALUES ('$username', '$password')");
              }
          }
          if ($isLoginOK)
          print "
            <a href='?p=classic'>Klasszikus mód</a>
            <a href='?p=time'>Időfutam mód</a>
            <a href='?p=scores'>Ranglista</a>
            <a href='?p=logout'>Kijelentkezés</a>
          ";
        ?>
        
    </div>

    <div class='belso jobb'>
      <?php
        if (isset($_GET['p']))
          $p = $_GET['p'];
        else
          $p = "main";
          
        if ($p=="main")
          include ("php/main.php");
        else if ($p=="classic")
          include("php/classic.php");
        else if ($p=="time")
          include("php/time.php");
        else if ($p=="scores")
          include("php/scores.php");
        else if ($p=="logout")
          include("php/logout.php");
      ?>
    </div>
  </div>
</body>
</html>