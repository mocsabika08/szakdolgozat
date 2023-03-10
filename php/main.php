<h2>Főmenü</h2>

<?php
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

    if (isset($_COOKIE['username']))
    {
        print "
            <p>Üdvözöllek ". $_COOKIE['username'] ." az Arkanoid játékomban!</p>
            <p>A játék során egy labdát kell a levegőben tartanod, míg az lerombolja az összes téglát. Két játékmód között választhatsz:</p>
            <p>A klasszikus módban szintről szintre lépve egyre több téglát kell lerombolni, valamint a labda sebessége is egyre gyorsabb.</p>
        ";
    }
    else
    {
        print "
            <form>
            <form action='index.php'>
            <table>
                <tr>
                    <td><label>Felhasználónév: </label></td>
                    <td><input type='text' name='username'></td>
                </tr>
                <tr>
                    <td><label>Jelszó: </label></td>
                    <td><input type='password' name='password'></td>
                </tr>
            </table>
            <button type='submit' name='submit'>Bevitel</button>
            </form>
        ";
    }
?>