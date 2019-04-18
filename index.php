<!DOCTYPE html>
<html lang="fi">
<?php
require "./yhteys.php";

if(!empty($_POST["nimi"]) && !empty($_POST["sposti"]) && !empty($_POST["Paikka"]))
{
	$nimi=$_POST["nimi"];
	$sposti=$_POST["sposti"];
	$Paikka=$_POST["Paikka"];
	
	
	
	$sql="INSERT INTO eetunlani(nimi,sposti,Paikka) VALUES('$nimi','$sposti','$Paikka')";
	
	$lause=$yhteys->prepare($sql);
	$lause->execute();
	
	header("Location:./onnistui.php");
}
?>
<head>
	<meta charset="utf-8">
	<title>Ilmoittautuminen</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
	<link rel="icon" href="./kuvat/logo.png">
</head>

<header class="header">
		
		<a class="brand" href="./index.php"><img class="image" src="./kuvat/logo.png"></a>
		
</header>

<body>

	
<div class="container">
  <form action="./index.php" method="post">
  
  	<h2>Ilmoittautuminen</h2>
	<table align="center">
		<tr>
			<td><label for="nimi">nimi</label></td>
			<td><input type="text" name="nimi" required></td>
		</tr>
		<tr>
			<td><label for="sposti">Sähköposti</label></td>
			<td><input type="email" name="sposti" required></td>
		</tr>
		<tr>
			<td><label for="Paikka">Paikka</label></td>
			
			<td><?php
					require_once("./yhteys.php");
			
					$sql = "SELECT PaikkaID FROM eetunpaikka";
					$result = mysqli_query($connection, $sql);
							
					echo "<select name='Paikka' required>";
					while ($row = mysqli_fetch_array($result)) {
					echo "<option value='" . $row['PaikkaID'] . "'>" . $row['PaikkaID'] . "</option>";
					}
					echo "</select>";
				?>
			</td>
		</tr>
		<tr class="right">
				<td></td>
				<td><input class="button" type="submit" value="Varaa paikka"></td>
		</tr>
	</table>
	<br>
	<p> Peruutus tehdään sähköpostitse</p>
	</form>
</div>
</body>

	<footer class="footer">
        LAN
    </footer>