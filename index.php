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
          <a href='?p=scores'>Ranglista</a>
          <a href='?p=classic'>Klasszikus mód</a>
          <a href='?p=time'>Időfutam mód</a>
      </div>

      <div class='belso jobb'>
        <?php
          if (isset($_GET['p']))
            $p = $_GET['p'];
          else
            $p = "main";
            
          if($p=="main")
            include("php/main.php");
          else if($p=="scores")
            include("php/scores.php");
          else if($p=="classic")
            include("php/classic.php");
          else if($p=="time")
            include("php/time.php");
        ?>
      </div>
    </div>
  </body>
</html>