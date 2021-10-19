<?php
    session_start();

    $id = $_SESSION['klient']['id'];
    // echo $id;

    $polacz = mysqli_connect('localhost', 'root', '');
    $baza = mysqli_select_db($polacz, 'shop');
    
    $kupionailosc1 = @$_POST['kupionailosc1'];
    $kupionailosc2 = @$_POST['kupionailosc2'];
    $kupionailosc3 = @$_POST['kupionailosc3'];
    $kupionailosc4 = @$_POST['kupionailosc4'];
    $kupionailosc5 = @$_POST['kupionailosc5'];
    $kupionailosc6 = @$_POST['kupionailosc6'];
    $kupionailosc7 = @$_POST['kupionailosc7'];
    $kupionailosc8 = @$_POST['kupionailosc8'];
    $kupionailosc9 = @$_POST['kupionailosc9'];
    $kupionailosc10 = @$_POST['kupionailosc10'];

   @$suma = ($kupionailosc1 * 25) + 
    ($kupionailosc2 * 100) + 
    ($kupionailosc3 * 50) + 
    ($kupionailosc4 * 10) + 
    ($kupionailosc5 * 30) + 
    ($kupionailosc6 * 6) + 
    ($kupionailosc7 * 5) + 
    ($kupionailosc8 * 8) + 
    ($kupionailosc9 * 35) + 
    ($kupionailosc10 * 19);

    // echo $suma;

    $kiedy = date('Y-m-d');
    // echo $kiedy;

    $zawartosc = "\"Eel $kupionailosc1 Pumpkin $kupionailosc2 Corn $kupionailosc3 Leek $kupionailosc4 Grapes $kupionailosc5 Mushroom $kupionailosc6 Plum $kupionailosc7 Hazelnut $kupionailosc8 Oyster $kupionailosc9 Coconut $kupionailosc10\"";
    // echo $zawartosc;

    $dane = "INSERT INTO zamowienia VALUES (NULL, ".$id.", ".$suma.", ".$zawartosc.", \"".$kiedy."\")";
    // echo $dane;

    if ($polacz->query($dane))
    {
      header('Location: shop.php');
    }
    else
    {
      throw new Exception($polacz->error);
    }

?>