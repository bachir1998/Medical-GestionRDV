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
					$row = $stmt -> fetchAll();
					echo "<div id='lesmedecin'>";
						echo"<table id='tabl' class='table table-striped table-bordered table-hover'>";
							echo"<thead><tr>
								<th>Email</th>
								<th>Nom</th>
								<th>Prenom</th>
								<th>Age</th>
								<th>Sexe</th>
								<th>Telephone</th>
								<th>nature</th>
								<th>Matricule</th>
								<th cl>Activer</th>
							
							</tr></thead>";
						echo'<tbody>';
								$i = 0;
							foreach($row as $v) 
							{
								$email = $v["email"];
								$conf = "oui";
								if($v["conf"] == 0)
								{
									$conf = "non";
								}
								echo '
									
									<tr>
										<td>'.$email.'</td>
										<td>'.$v["nom"].'</td>
										<td>'.$v["prenom"].'</td>
										<td>'.$v["age"].'</td>
										<td>'.$v["sexe"].'</td>
										<td>'.$v["tel"].'</td>
										<td>'.$v["nature"].'</td>
										<td>'.$v["matricule"].'</td>
										<td>';
											echo "<input class='btn btn-primary' type='text' id='email$i' value='$conf' readonly>
											
										</td>
									</tr>
									
								";
								echo "<script type='text/javascript'>
							$(document).ready(function(){;
								$('#email$i').click(function(){
									var currow = $(this).closest('tr');
									var col1 = currow.find('td:eq(0)').text();
									var col9 = $('#email$i').val();
									alert(col9);
									if(col9 == 'non')
									{
										$.post(
											'activer.php',
											{
												email:col1
											},
											function(data){
												alert(data);
											}
										);
										$('#email$i').val('oui');
									}
									else if(col9 == 'oui')
									{
										$.post(
											'desactiver.php',
											{
												email:col1
											},
											function(data){
												alert(data);
											}
										);
										$('#email$i').val('non');
									}
								
								});
								});
						</script>";
								$i++;
								
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


