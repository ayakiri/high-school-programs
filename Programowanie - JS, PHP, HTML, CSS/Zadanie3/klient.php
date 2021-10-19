<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <title>Document</title>
</head>
<body>
    <div class="all">
        <a href="index.html"><img src="banner.png" class="banner"></a>

        <div class='page'>
            <div class="menu">
                <a href="index.html">Strona glowna</a> <br />
                <a href="gazetka.html">Gazetka promocyjna</a> <br />
                <a href="klient.php">Zalogowany klient</a> <br />
                <a href="kontakt.html">Kontakt</a> <br />
            </div>

            <div class="content">
                <form method="GET">
                    Login: <br />
                    <input name="login" type="text"> <br />
                    Haslo: <br />
                    <input name="password" type="password"> <br />
                    <input type="submit" value="loguj">
                </form>

                <?php

                // TO NIE DZIAŁA ALE POWINNO ¯\_(ツ)_/¯

                    @$login = $_POST['login'];
                    @$password = $_POST['password'];
                    $userlist = file('uzytkownicy.txt');
                    $success = false;

                    foreach ($userlist as $user) {
                        $user_details = explode('|', $user);
                        if ($user_details[0] == $login && $user_details[1] == $password) {
                            $success = true;
                            break;
                        }
                    };

                    if ($success) {
                        echo "Witaj $login";
                    } else {
                        echo "Bledny login lub haslo";
                    }
                ?>
            </div>

            <div class="news">
                <img src="laptop1.png" class="lap">
                <img src="laptop2.png" class="lap">
                <img src="laptop3.png" class="lap">
            </div>
        </div>

        <div class="footer">
            <b>Visual Studio Code, 16.09.2020</b>
        </div>
    </div>
</body>
</html>