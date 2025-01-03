<?php
    $conn = new mysqli('localhost', 'root', '', 'motory');

    $sql = "SELECT w.nazwa, w.opis, w.poczatek, z.zrodlo FROM `wycieczki` w inner join zdjecia z on z.id = w.zdjecia_id;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row["nazwa"] . " rozpoczyna się w " . $row["poczatek"] . " <a href=" . $row["zrodlo"] . ".jpg>zobacz zdjęcie</a> </li>";
        }
        echo "</ul>";
        $result -> close();
    } else {
        echo "Brak wyników";
    }

    $sql = "SELECT count(*) as liczba_wycieczek FROM `wycieczki`;";
    $result = $conn->query($sql);

    while($tab = mysqli_fetch_row($result)) {
		echo "Wpisanych wycieczek: $tab[0]";
	}
    $result -> close();

    $conn-> close();
?>