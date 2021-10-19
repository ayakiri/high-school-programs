<?php
if($_POST["submit"]) {
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $klasa = $_POST['klasa'];
    $plec = $_POST['plec'];
    $przedmiot = $_POST['przedmiot'];
    $zainteresowania = $_POST['zainteresowania'];

    $mailContent = "$imie, $nazwikso, $klasa, $plec, $przedmiot, $zainteresowania";

    mail("szkola@gamil.com", "Zgloszenie", $_POST[$mailContent], "From: yyyy@zzz.xxx");
}
?>