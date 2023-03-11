<?php

    setcookie("username", "", time()-3600);
    setcookie("password", "", time()-3600);
    setcookie("level", "", time()-3600);
    setcookie("lives", "", time()-3600);
    setcookie("score", "", time()-3600);

    header("location:./");
    
?>