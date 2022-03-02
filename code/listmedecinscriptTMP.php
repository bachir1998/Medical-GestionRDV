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
	<div class="container">
		<div class='row'>
			<div class='col-lg-12'>
				<?php
					$dsn = 'mysql:host=localhost;dbname=medicales';
					$bdd= new PDO($dsn, 'root', '');		
					
					$nature = "medecin";
							
					$select = "SELECT * FROM personne  WHERE nature like  ? ";
					$stmt = $bdd -> prepare($select);
					$stmt -> execute(array($nature));

					if($stmt->execute())
					{
						$i = 0;
					$row = $stmt -> fetch();
					echo "<div>";
							echo"<table class='table table-striped table-bordered table-hover'>";
							echo"<thead><tr>
							<th>Email</th>
							<th>Nom</th>
							<th>Prenom</th>
							<th>Age</th>
							<th>Sexe</th>
							<th>Telephone</th>
							<th>nature</th>
							<th cl>Activer</th>
							<th>Desaciver</th>
							
							</tr></thead>";
						echo'<tbody>';
					while($row)
					{ 
						$email = $row['email'];
						
						echo "<tr class='success'>";
								echo '<td>'.$email.'</td>';
								echo '<td id="t">'.$row["nom"].'</td>';
								echo '<td>'.$row["prenom"].'</td>';
								echo '<td>'.$row["age"].'</td>';
								echo '<td>'.$row["sexe"].'</td>';
								echo '<td>'.$row["tel"].'</td>';
								echo '<td>'.$row["nature"].'</td>';
								
								echo '<td><form>
										<input type = "hidden" name="email" id="email"'.$i.' value ='.$email.' />
										<input   class="activem" type = "submit" value="ACTIVER">
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
			</div>
		</div>
	</div>
  </body>
<html>


