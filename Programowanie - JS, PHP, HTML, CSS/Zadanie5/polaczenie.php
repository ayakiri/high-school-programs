<?php
    $baza = @mysqli_connect('localhost', 'aabacki', 'Xxsad123')
    or die('Brak polaczenia');

    $tabela = @mysqli_select_db($baza, 'samochody')
    or die('Brak bazy danych');

    mysqli_close($baza);

?>