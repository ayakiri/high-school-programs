<!DOCTYPE html>

<html>
    <head>
        <title>Jaka to liczba</title>
        <link rel="stylesheet" type="text/css" href="mystyle.css" />
    </head>

    <body>
        <a href="index.php"><img src="banner.png" class="banner" /></a>
        <div class="page">
            <div class="menu">
                MENU: <br />
                <a href="index.php">Opis</a><br />
                <a href="strona1.php">Jaka to liczba?</a><br />
                <a href="strona2.html">Liczby calkowite z zakresu</a>
            </div>

            <div class="content">
                <form method="POST">
                    Login: 
                    <input type="text" name="login"> <br />
                    Password: 
                    <input type="password" name="password"> <br />
                    <input type="submit" value="Wyslij">
                </form>

                <?php
            error_reporting(0);
            $login = $_POST['login'];
            $password = $_POST['password'];

            $polacz = @new mysqli('localhost', 'root', '', 'loginy');
            if(mysqli_connect_error() != 0){
                echo '<p> Blad polaczenia: ' . mysqli_connect_error() . '</p>';
            } else {
                $wynik = @$polacz -> query('SELECT * FROM users');
                if($wynik === false) {
                    echo '<p>Wystapil blad w zapytaniu</p>';
                    $polacz -> close();
                } else {
                    while ($row = mysqli_fetch_row($wynik)) {
                        if($row[1] == $login){
                            if($row[2] == $password){
                                    echo "
                                        <script>
                                            var a = prompt('Podaj liczbe')

                                            if(a > 0){
                                                document.write('Liczba ' + a + ' jest dodatnia')
                                            } else if (a < 0 ){
                                                document.write('Liczba ' + a + ' jest ujemna')
                                            } else if(a == 0){
                                                document.write('Liczba ' + a + ' jest zerem')
                                            } else {
                                                document.write('Liczba ' + a + ' jest nieprawidlowa')
                                            }

                                        </script>
                                        ";
                            }
                        }
                      }                
                }
            }
        ?>
            </div>
        </div>
    </body>
</html>