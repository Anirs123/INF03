<?php
    $conn = new mysqli('localhost','root','','ratownictwo');

    $znr = $_POST['znr'];
    $dnr = $_POST['dnr'];
    $adr = $_POST['adr'];
    $data = date('H:m:s');

    $q = "INSERT INTO `zgloszenia` (`id`, `ratownicy_id`, `dyspozytorzy_id`, `adres`, `pilne`, `czas_zgloszenia`) VALUES (NULL, '$znr', '$dnr', '$adr', '0', '$data')";

    // echo $q;
    $res = $conn->query($q);
    if($res){
        echo 'dodano dane!';
    }
    else{
        echo 'nie dodano danych!';
    }
    
    $conn -> close();
?>