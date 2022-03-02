<!DOCTYPE html> 
<html>
  <head>
    <meta charset="utf-8" />	
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    rel="stylesheet">
  
    <link rel="stylesheet"  href="../bootstrap/css/bootstrap.css"/>
    <script src="../jquery-3.4.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"> </script>
	<script src="script.js"> </script>
  </head>
  <body> 
  	<?php
		$dsn = 'mysql:host=localhost;dbname=medicales';
		$bdd= new PDO($dsn, 'root', '');		
		
		$nature = "patient";
				
		$select = "SELECT * FROM personne  WHERE nature like  ? ";
		$stmt = $bdd -> prepare($select);
		$stmt -> execute(array($nature));

		if($stmt->execute())
		{
		$row = $stmt -> fetch();
		echo "<div>";
				echo"<table class='table'>";
				echo"<thead><tr>
				<th>Email</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Age</th>
				<th>Sexe</th>
				<th>Telephone</th>
				<th>nature</th>
				<th>Activer</th>
				<th>Desaciver</th>
				
				</tr></thead>";
			echo'<tbody>';
		while($row)
		{ 
			
			echo "<tr>";
					echo '<td>'.$row["email"].'</td>';
					echo '<td id="t">'.$row["nom"].'</td>';
					echo '<td>'.$row["prenom"].'</td>';
					echo '<td>'.$row["age"].'</td>';
					echo '<td>'.$row["sexe"].'</td>';
					echo '<td>'.$row["tel"].'</td>';
					echo '<td>'.$row["nature"].'</td>';
					
					echo '<td><form method = "POST" action = "modif.php">
							<input type = "hidden" name="update" value ='.$row["email"].' />
							<button class="button is-warning is-rounded"   type = "submit"  value ="Modifier">ACTIVER</button>
						</form>';
					echo "</td>";
					
					echo '<td><form method = "POST" action = "modif.php">
							<input type = "hidden" name="update" value ='.$row["email"].' />
							<button class="button is-warning is-rounded"   type = "submit"  value ="Modifier">DESACTIVER</button>
						</form>';
					echo "</td>";
					/*$im=$row["url"];
					echo '<td>';
					//echo "<img id = 'im' src='$im' /></td>";
					echo "</td>";*/
			echo "</tr>";
			$row = $stmt -> fetch();
		}
		echo"</tbody></table>";
		
		
		}
		else
		echo "echec";
	?>
  </body>
<html>


