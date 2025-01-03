<!-- Napisany w języku PHP, w pliku kalendarz.php
– Należy stosować znaczące nazewnictwo zmiennych i funkcji w języku polskim lub angielskim
– Łączy się z serwerem bazodanowym na localhost, użytkownik root bez hasła, baza danych o nazwie
terminarz
– Działanie skryptu 1:
– Wysyła do bazy danych zapytanie 1
– Wyświetla rozdzielone średnikiem i spacją wszystkie wartości zwrócone zapytaniem
– Działanie skryptu 2:
– Wysyła do bazy danych zapytanie 2
– Za pomocą znacznika sekcji definiuje blok, a w nim wyświetla dane
dotyczące jednego zwróconego wiersza. Blok jest zgodny z Obrazem
3 oraz jest w nim wyświetlone:
– Data zadania w nagłówku szóstego stopnia
– Pole wpis w paragrafie (akapicie)
– Liczba wygenerowanych bloków odpowiada liczbie wierszy zwróconych zapytaniem
– Na końcu działania skrypt zamyka połączenie z serwerem. -->
<?php
    $conn = new mysqli('localhost', 'root', '', 'terminarz');

    $sql = "SELECT DISTINCT wpis FROM `zadania` WHERE dataZadania BETWEEN '2020-07-01' and '2020-07-07' and wpis != ''";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo " - " . $row["wpis"] . "<br>";
        }
    } else {
        echo "Brak wyników";
    }

    // skrypt 2
    $sql2 = "SELECT dataZadania, wpis FROM `zadania` where dataZadania like '%-07-%';";

    $res2 = $conn->query($sql2);

    if ($res2->num_rows > 0) {
        while($row = $res2->fetch_assoc()) {
            echo "<div class='kalendarz'>";
            echo "<h6>" . $row["dataZadania"] . "</h6>";
            echo "<p>" . $row["wpis"] . "</p>";
            echo "</div>";
        }
    } else {
        echo "Brak wyników";
    }

    $conn -> close();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /*  kolor tła #9FA8DA, szerokość 160 px, wysokość 85 px, marginesy zewnętrzne
5 px, obramowanie linią ciągłą o szerokości 1 px i kolorze #6F79A8; tekst, który nie mieści się w bloku
jest ukryty i wyświetlany bez paska przewijania (np. obraz 2, pierwszy blok kalendarza)  */
        .kalendarz{
            background-color: #9FA8DA;
            width: 160px;
            height: 85px;
            margin: 5px;
            border: 1px solid #6F79A8;
            overflow: hidden;
            float: left;
        }        
        h6{
            text-align: center;
        }
    </style>
</head>
<body>
    
</body>
</html>