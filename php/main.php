<h2>Főmenü</h2>

<?php

    include "insert.php";

    if (!empty($_GET['username']) && !empty($_GET['password']))
    {
        $cookie_name = "username";
        $cookie_value = $_GET["username"];
        setcookie($cookie_name, $cookie_value, "/");

        $cookie_name = "password";
        $cookie_value = $_GET["password"];
        setcookie($cookie_name, $cookie_value, "/");

        header("location:./");
    }

    if ($isLoginOK)
    {
        print "
            <p>Üdvözöllek <b>". $_COOKIE['username'] ."</b> az Arkanoid játékomban!</p>
            <p>A játék során egy labdát kell a levegőben tartanod, míg az lerombolja az összes téglát. Szintről szintre egyre több téglát kell lerombolni, és a labda sebessége is növekszik. Használd a ⬅️ ➡️ gombokat az ütő mozgatására.</p>
            <p>Két játékmód között választhatsz:</p>
            <p><b>Klasszikus</b> módban a cél a minél nagyobb pontszám elérése. A játék addig tart, amíg mindhárom életed el nem veszíted. A pontszámod az aktuális szintedtől és a hátralévő életeidtől függ. Extra pontot kapsz, ha egyszerre több téglát törsz össze.</p>
            <p><b>Időfutam</b> módban 5 perc alatt kell minél több színtet elérni. Holtverseny esetén az kapja a nagyobb helyezést, aki az elért szinten több hátralévő élettel rendelkezett.</p>
            <p>Az aktuális helyezések elérhetőek a <b>Ranglista</b> menüpontban.</p>
            <p>Jó szórakozást!</p>
            ";
    }
    else
    {
        print "
        <div id='loginform'>
            <form>
            <form action='index.php'>
            <table>
                <tr>
                    <td><label>Felhasználónév: </label></td>
                    <td><input type='text' name='username' required></td>
                </tr>
                <tr>
                    <td><label>Jelszó: </label></td>
                    <td><input type='password' name='password' required></td>
                </tr>
            </table>
            <button type='submit' name='submit'>Bevitel</button>
            </form>
        <div>
        ";
    }

?>