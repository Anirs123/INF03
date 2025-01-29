<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styl.css" type="text/css">
    <title>Poziom rzek</title>
</head>
<body>
    <header>
        <img src="obraz1.png" alt="Mapa Polski">
    </header>
    <header>
        <h1>Rzeki w województwie dolnośląskim</h1>
    </header>
    <menu>
        <form action="poziomRzek.php" method="POST">
            <input type="radio" id="opcja1" name="grupa" value="opcja1"><label for="opcja1" class="opcje">Wszystkie</label>
            <input type="radio" id="opcja2" name="grupa" value="opcja2"><label for="opcja2" class="opcje">Ponad stan ostrzegawczy</label>
            <input type="radio" id="opcja3" name="grupa" value="opcja3"><label for="opcja3" class="opcje">Ponad stan alarmowy</label>
            <input type="submit" value="Pokaż">
        </form>
    </menu>
    <aside>
        <h3>Stany na dzień 2022-05-05</h3>
        <table>
            <tr>
                <th>Wodomierz</th>
                <th>Rzeka</th>
                <th>Ostrzegawczy</th>
                <th>Alarmowy</th>
                <th>Aktualny</th>
            </tr>
            <?php
                $conn = new mysqli('localhost', 'root', '', 'rzeki');

                // Sprawdź, czy zmienna POST istnieje
                if (isset($_POST['grupa'])) {
                    $grupa = $_POST['grupa'];

                    // Przypisz odpowiednie zapytanie SQL na podstawie wybranej opcji
                    if ($grupa === 'opcja1') {
                        $sql = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM `wodowskazy` JOIN pomiary ON pomiary.wodowskazy_id = wodowskazy.id WHERE dataPomiaru = '2022-05-05';";
                    } elseif ($grupa === 'opcja2') {
                        $sql = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM `wodowskazy` JOIN pomiary ON pomiary.wodowskazy_id = wodowskazy.id WHERE dataPomiaru = '2022-05-05' AND stanWody > stanOstrzegawczy;";
                    } elseif ($grupa === 'opcja3') {
                        $sql = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM `wodowskazy` JOIN pomiary ON pomiary.wodowskazy_id = wodowskazy.id WHERE dataPomiaru = '2022-05-05' AND stanWody > stanAlarmowy;";
                    } else {
                        $sql = ""; // Bezpieczne domyślne zapytanie (np. puste)
                    }

                    // Wykonaj zapytanie tylko, jeśli zostało zdefiniowane
                    if($sql){
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row["nazwa"] . "</td>
                                        <td>" . $row["rzeka"] . "</td>
                                        <td>" . $row["stanOstrzegawczy"] . "</td>
                                        <td>" . $row["stanAlarmowy"] . "</td>
                                        <td>" . $row["stanWody"] . "</td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>Brak wyników</td></tr>";
                        }
                    }
                } else {
                    echo "<tr><td colspan='5'>Nie wybrano żadnej opcji</td></tr>";
                }

                $conn->close();
                ?>
        </table>
    </aside>
    <section>
        <h3>Informacje</h3>
        <ul>
            <li>Brak ostrzeżeń o burzach z gradem</li>
            <li>Smog w mieście Wrocław</li>
            <li>Silny wiatr w Karkonoszach</li>
        </ul>
        <h3>Średnie stany wód</h3>
        <?php
            $conn = new mysqli('localhost', 'root', '', 'rzeki');
            
            $sql = "SELECT dataPomiaru, AVG(stanWody) as srednia FROM `pomiary` group by dataPomiaru;";
            $result = mysqli_query($conn, $sql);
            while($tab = mysqli_fetch_row($result)) {
                echo "$tab[0]: $tab[1] <br>";
            }

            $conn -> close();
        ?>
        <a href="https://komunikaty.pl">Dowiedz się więcej</a>
        <img src="obraz2.jpg" alt="rzeka">
    </section>
    <footer>
        <p>Stronę wykonał: 0000000000</p>
    </footer>
</body>
</html>