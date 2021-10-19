<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>.: Shop :. </title>
    </head>
    <body class="shop">
        <div class="content">
            <div class="logo">
                <img src="logo.png">
            </div>
            <div class="hello">
                    <?php
                        if(isset($_SESSION)) echo "<h1 style='text-align: center;'> Witaj ".$_SESSION['klient']['login']."</h1>";
                    ?>
                </div>
        </div>
        <div class="stuff">
            <form action="kup.php" method="post">
                <table>
                    <?php
                    $polacz = mysqli_connect('localhost', 'root', '');
                    $baza = mysqli_select_db($polacz, 'shop');
        
                    $nazwa = mysqli_query($polacz, 'SELECT * FROM `produkty`');

                    $i = 1;
                    while ($pole = mysqli_fetch_array($nazwa)){
                            echo "<tr>";
                                echo "<td>";
                                    echo "<div>";
                                        echo '<img src=food/'.$pole[4].'.png>';
                                        echo '<p style="margin-top: -30px;">'.$pole[0].' '.$pole[1].'</p>';
                                        echo '<p> Cena: '.$pole[2].'<br /> Dostepna ilosc: '.$pole[3].'</p>';
                                    echo "</div>";
                                    echo "<div>";
                                        echo "Chce zamowic: <input type='number' max=".$pole[3]." min='0' name='kupionailosc".$i."'>";
                                    echo "</div>";
                                echo "</td>";
                            echo "</tr>";
                        $i++;
                    }
                    ?>
                </table>
                <input type="submit" value="Kup" class="submit">
            </form>
            </div>
    </body>
</html>