<!DOCTYPE html>
<html lang="fi">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Elokuvatietokanta</title>
		<link href="sakila-style.css" rel="stylesheet">
		<script language="javascript" type="text/javascript" src="valikko.js"></script>
	</head>
	<body>

		<?php
			$palvelin = 'localhost';
			$kayttaja = 'root';
			$salasana = 'jukka1';
			$tietokanta = 'sakila1';
			
			$yhteys = new mysqli($palvelin, $kayttaja, $salasana, $tietokanta);
			
			if ($yhteys->connect_error) {
				die('Yhteyden muodostuminen epäonnistui:' . $yhteys->connect_error);
			}
			
			$yhteys->set_charset('utf8');
			
			$hakusql = 'SELECT * FROM film';
			$tulokset = $yhteys->query($hakusql);
			
			if ($tulokset->num_rows > 0) {
				while($rivi = $tulokset->fetch_assoc()) {
					echo 'Elokuvan nimi:' . $rivi['title']. 'Kuvaus:' . $rivi['description']. 'Ikäraja:' . $rivi['rating']. 'Julkaisuvuosi:' . $rivi['release_year']. '<br>';
				}
			} else {
				echo 'Ei tuloksia';
			}
			?>
			
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<div class="topnav" id="myTopnav">
			<a href="#etusivu" class="active">Etusivu</a>
			<a href="#romantiikka">Romantiikka</a>
			<a href="#jannitys">Jännitys</a>
			<a href="#komedia">Komedia</a>
			<a href="#seikkailu">Seikkailu</a>
			<a href="#scifi">Scifi</a>
			<a href="#haku">Hae</a> 
			<a href="javascript:void(0);" class="icon" onklick="myFunction()">
				<i class="fa fa-bars"></i>
			</a>
		</div>
		
		<h1>Hae elokuva</h1><br>
		
		<form action="" method="get">
			<label>Elokuvan nimi:
				<input type="text" name="elokuvan_nimi" id="elokuva">
			</label>
			
			<input type="submit" value="Hae"><br><br>
			
		</form>
		
		<?php
			$yhteys->close();
		?>
		
	</body>
</html>