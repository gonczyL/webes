<!DOCTYPE html>
<html>
    <head>
        <title>Második beadandó feladat</title>
        <link href="phpstyle.css" rel="stylesheet" type="text/css">
    </head>
    
    <body>
        <div align = "center">
        <div id="parag" class = "nnk">Gönczy László ETH8MO</div>
        <form id = "kinezet" action = "index.php" method = "POST">
        <div id="position">Email cím</div>
        <input id = "bekerusername" name="email" type = "text" size="30" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required></input>
        <br>
        <div id="position2">Jelszó</div>
        <input id = "bekerpassword" name="jelszo" type = "password" size="30"></input>
        <br>
        <span id = "username_error">Nincs ilyen felhasználó</span>
        <span id = "password_error">Hibás jelszó</span>
        <br>
        <input type = "submit" value = "Bejelentkezés" id="button"></input>
        </div>
        </form>
        <?php
	        include 'ellenoriz.php';
        ?> 
    </body>
</html>