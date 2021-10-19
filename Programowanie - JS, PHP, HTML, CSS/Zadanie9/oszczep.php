<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rzut oszczepem</title>
        <link rel="stylesheet" type="text/css" href="styl_oszczep.css">
    </head>

    <body>
        <?php
            $polacz = mysqli_connect('localhost', 'root', '');
            $baza = mysqli_select_db($polacz, 'sportowcy');

            $rekord = mysqli_query($polacz, 'SELECT wyniki.wynik FROM `wyniki` WHERE wyniki.dyscyplina_id = 3 ORDER BY wyniki.wynik DESC LIMIT 1;');

            $ilosc = mysqli_query($polacz, 'SELECT COUNT(*) FROM `sportowiec`;');

            $nazwa = mysqli_query($polacz, 'SELECT imie, nazwisko FROM `sportowiec`');
        ?>

        <div class="banner">
            <h1>Klub sportowy: rzut oszczepem</h1>
        </div>
        <div class="glowny">
            <?php 
                $wiersz = mysqli_fetch_row($rekord);
                echo '<h1>';
                echo 'Nasz rekord: ';
                print_r($wiersz[0]);
                echo '</h1>';
            ?>
            <table>
                <?php
                    $i = 1;
                    while ($pole = mysqli_fetch_array($nazwa)){
                        $sredni = mysqli_query($polacz, "SELECT AVG(wyniki.wynik) FROM wyniki JOIN sportowiec ON wyniki.sportowiec_id = sportowiec.id WHERE wyniki.dyscyplina_id = 3 AND wyniki.sportowiec_id = '$i';");
                        $avg = mysqli_fetch_array($sredni);
                            if($i%2 != 0){
                                echo "<tr>";
                            };
                            echo "<td style='padding: 15px;'> 
                                    <h3> ";
                            echo $pole[0].' '.$pole[1];
                            echo "<br />";
                            echo "<p>Średni wynik: ".$avg[0]."</p>";
                            echo "  </h3> 
                                </td>";
                            if($i%2 == 0){
                                echo "</tr>";
                            };
                        $i++;
                    }
                ?>
            </table>
        </div>
        <div class="stopka">
            <p>Klub sportowy <br />
            Stronę opracowała Dobrzyniewicz Agata</p>
        </div>
    </body>
</html>