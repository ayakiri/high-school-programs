<?php
    $baza = @mysqli_connect('localhost', 'root', 'root', 'questions');

    if(mysqli_connect_errno()){
        echo "Wystąpił błąd podczas łączenia z bazą danych.";
    }

?>