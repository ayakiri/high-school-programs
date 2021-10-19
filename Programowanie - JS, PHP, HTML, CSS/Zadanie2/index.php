<!DOCTYPE html>

<html>
    <head>
        <title>Strona glowna</title>
        <link rel="stylesheet" type="text/css" href="mystyle.css" />
    </head>

    <body>
        <a href="index.php"><img src="banner.png" class="banner" /></a>
        
        <div class="page">
            <div class="menu">
                <?php
                    echo "MENU:" 
                ?>
                <br />
                <a href="index.php">Opis</a><br />
                <a href="strona1.php">Jaka to liczba?</a><br />
                <a href="strona2.html">Liczby calkowite z zakresu</a>
            </div>

            <div class="content">
                <?php
                    echo "Agatka Dobrzyniewicz"
                ?>
            </div>
        </div>
    </body>
</html>