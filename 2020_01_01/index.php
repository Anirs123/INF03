<?php
    $conn = new mysqli('localhost', 'root', '', 'wedkowanie');

    if($conn->connect_error){ //nie trzeba !!!!
        die("Połączenie nieudane: " . $conn->connect_error);
    }

    $q = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 2";

    $result = $conn->query($q);
    
    if($result->num_rows > 0){
        echo "<ul>";
        
        while($row = $result->fetch_assoc()) {
            echo $row['id'] . ". " . $row['nazwa'] . ", występuje w: " . $row['wystepowanie'] . "<br>";
        }
        echo "</ul>";
    }
    else{
        echo "Brak wyników.";
    }

    $conn->close();
?>
