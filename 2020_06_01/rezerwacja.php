<?php
    echo "to dziala<br>";
    echo "Dodano rezerwacje do bazy<br>";
    
    $conn = new mysqli('localhost', 'root', '', 'baza');

    $data = $_POST['data'];
    $ileos = $_POST['ileos'];
    $nrtel = $_POST['nrtel'];
    
    $q = "INSERT INTO rezerwacje(data_rez, liczba_osob, telefon) VALUES('$data', '$ileos', '$nrtel')";
    echo $q;
    $result = $conn -> query($q);

    $conn-> close();
?>