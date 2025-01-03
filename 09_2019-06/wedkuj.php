<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>Wędkujemy</title>
	<link rel="stylesheet" href="styl_1.css"/>
</head>
<body>
	<header>
		<h1>Portal dla wędkarzy</h1>
	</header>
	<section>
		<h2>Ryby drapieżne naszych wód</h2>
		<ul>
			<?php
				$conn = mysqli_connect('localhost', 'root', '', 'wedkowanie');
				$kwer = "SELECT nazwa, wystepowanie FROM Ryby WHERE styl_zycia = 1;";
				$result = mysqli_query($conn, $kwer);
				while($row = mysqli_fetch_row($result)){
					echo "<li>$row[0], występowanie: $row[1]</li>";
				}
			?>
		</ul>
	</section>
	<aside>
		<img src="ryba1.jpg" alt="Sum"/><br/>
		<a href="kwerendy.txt" download>Pobierz kwerendy</a>
	</aside>
	<footer>
		<p>Stronę wykonał: 0000000000</p>
	</footer>
</body>
</html>