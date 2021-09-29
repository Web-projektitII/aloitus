<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Web-ohjelmointikurssin aloitus</title>
<meta name="description" content="Web-ohjelmointikurssin HTML-aloitus.">
<meta name="author" content="Web-ohjelmoija">
<meta property="og:title" content="Web-ohjelmointikurssin aloitus">
<meta property="og:type" content="web-sivu">
<!--<meta property="og:url" content="http://127.0.0.1/aloitus/aloitus.html">-->
<meta property="og:description" content="HTML-malli.">
<!--<meta property="og:image" content="image.png">-->
<link rel="stylesheet" href="site.css">
<!--<script src="scripts.js"></script>-->
</head>
<?php
include("dbconnect.php");
$link->set_charset("utf8");
?>
<body>
<?php
include("header.html");
?>
<div>

<?php
$query = "INSERT INTO henkilo ( hetu,nimi,osoite,puhelinnumero )
		  VALUES ('281182-070W','Anne Autoilija','Kanervapolku 2','358501640837'),
		         ('080173-169T','Matti Miettinen','Koivukuja 25','358401842950'),
				 ('120760-093B','Tapio Tamminen','Tammistontie 18','358400576397'),
				 ('200292-195H','Teemu Tamminen','Tammistontie 18','358409740768')
		  ON DUPLICATE KEY UPDATE hetu = hetu";		 
$link->query($query);
if ($link->error){
  echo "Virhe:$link->error<br>";
  echo "Virhenro:$link->errno<br>";
  }

$lisatty = $link->affected_rows;
echo "$query,<br>Lisätty:$lisatty riviä.<br>";

/*$query = "SELECT * FROM henkilo WHERE nimi LIKE 't%' ORDER BY nimi,hetu";
$result = $link->query($query);
if ($result->num_rows > 0) {
	while($row = $result->fetch_array(MYSQLI_ASSOC)) {
       printf("hetu: %s, nimi: %s, osoite: %s, puhelinnumero: %d <br>", 
       $row["hetu"], $row["nimi"], $row["osoite"],$row["puhelinnumero"]);               
       }
} else {
   printf('No record found.<br />');
   }
*/
   
   
/*$query = "UPDATE henkilo SET nimi = CONCAT(nimi,' Jr') 
  WHERE nimi = 'Teemu Tamminen'";
$link->query($query);
$muutettu = $link->affected_rows;
echo "Muutettu:$muutettu riviä.<br>";*/

/*$query = "DELETE FROM henkilo WHERE nimi LIKE 'Teemu%'";
$link->query($query);
$poistettu = $link->affected_rows;
echo "Poistettu:$poistettu riviä.<br>";*/
   
//mysqli_free_result($result);

$query = "SELECT * FROM henkilo LEFT JOIN sakko ON sakko.henkilo = hetu WHERE nimi LIKE 'a%' ORDER BY nimi,hetu";
$result = $link->query($query);
if ($result->num_rows > 0) {
	while($row = $result->fetch_array(MYSQLI_ASSOC)) {
       printf("hetu: %s, nimi: %s, osoite: %s, puhelinnumero: %d, syy: %s<br>", 
       $row["hetu"], $row["nimi"], $row["osoite"],$row["puhelinnumero"],$row['syy']);               
       }
} else {
   printf('No record found.<br />');
   }



$pvm = "2012-01-02";
$auto = "CES-528";
$summa = 50;
$syy = "Virheellinen pysäköinti";
$query = "INSERT INTO sakko (auto,henkilo,pvm,summa,syy)
  SELECT '$auto',hetu,'$pvm','$summa','$syy'
  FROM henkilo WHERE nimi = 'Anne Autoilija'";
$result = $link->query($query);
$lisatty = $link->affected_rows;
echo "$query,<br>Lisätty:$lisatty riviä.<br>";


$query = "UPDATE auto SET omistaja=(SELECT hetu FROM henkilo WHERE nimi = 'Tapio Tamminen') WHERE rekisterinro='CES-267'";
$link->query($query);
$lisatty=$link->affected_rows;
echo "$query,Muutettu: $lisatty riviä <br>";

$query = "UPDATE auto INNER JOIN henkilo ON auto.omistaja <> hetu
SET auto.omistaja = henkilo.hetu 
WHERE rekisterinro='CES-267' AND henkilo.nimi = 'Teemu Tamminen'";
$link->query($query);
$lisatty=$link->affected_rows;
echo "$query,Muutettu: $lisatty riviä <br>";

$link->close();
?>

</div>
<?php
include("footer.php");
?>
</body>
</html>