<?php
    session_start();
?>

<?php
  $dsn = 'mysql:host=localhost;dbname=medicales';
  $bdd= new PDO($dsn, 'root', '');		
  $v = "v";
  $idrv = 0;
  $d=date('Y-m-d');
  $h=date('H:i');
  				
  $select1 = 'select * FROM rdv r join services s join personne p join district d on r.idpatient = p.email and r.idservice = s.idservice and s.idistrict = d.idistrict  WHERE r.idpers like ? and dateRV>="'.$d.'" and r.statut = ?';
  $stmt = $bdd -> prepare($select1);
  $stmt -> execute(array($_SESSION['email'],$v));

  if($stmt->execute())
  {
    $row = $stmt -> fetch();
    $t = 0;
    echo '<center>';
    echo'<div class="container">';
    echo "<div id='lesmedecin'><legend class='btn btn-info'><center>LISTE DE VOS RENDER-VOUS</center></legend>";
    echo"<table id='tabl' class='table table-striped table-bordered table-hover'>";
     echo"<strong><thead class='thead-info' style='font-weight:bold'><tr>";
     
            echo'<th> Prénom et nom du patient</th>';
            echo'<th> Age du patient</th>';
			echo'<th> Sexe du patient</th>';
            echo'<th> Services</th>';
            echo'<th> District</th>';
            echo'<th> Date du rendez-vous</th>';
            echo'<th> Heure du rendez-vous</th>';
            echo'<th> Supprimer le rendez-vous </th>';
            echo'</tr></thead></strong>'; 
            
            echo'<tbody>';
              while($row)
              {
				if((($row['dateRV'] == $d )))
				{
					if($h <= $row['Deb'])
					{
						$idrv = $row["idrdv"];
						echo'<tr>
						<td>'.$row["prenom"].' '.$row["nom"].'</td>
						<td>'.$row["age"].' </td>
						<td>'.$row["sexe"].' </td>
						<td>'.$row["nomservices"].' </td>
						<td>'.$row["nomdistrict"].' </td>
						<td>'.$row["dateRV"].' </td>
						<td>'.$row["Deb"].' </td>
						<td>
							<form action="medecin.php" method="post" >
								<input type="hidden" name="idrv" value='.$idrv.'/>
								<input  type="submit" class="btn btn-warning" value="SUPPRIMER"/> 
							</form>
						</td>
						</tr>';
						
					}
					$row = $stmt -> fetch();
				}
				else if(($row['dateRV'] > $d ))
				{
					$idrv = $row["idrdv"];
					echo'<tr>
					<td>'.$row["prenom"].' '.$row["nom"].'</td>
					<td>'.$row["age"].' </td>
					<td>'.$row["sexe"].' </td>
					<td>'.$row["nomservices"].' </td>
					<td>'.$row["nomdistrict"].' </td>
					<td>'.$row["dateRV"].' </td>
					<td>'.$row["Deb"].' </td>
					<td>
						<form action="medecin.php" method="post" >
							<input type="hidden" name="idrv" value='.$idrv.'/>
							<input  type="submit" class="btn btn-warning" value="SUPPRIMER"/> 
						</form>
					</td>
					</tr>';
					$row = $stmt -> fetch();
				}
				else
				{
					$row = $stmt -> fetch();
				}
              }
              echo'</tbody></table>';
              echo'</div>';
             echo'</div>'; 
         
        
       echo '</center>';
    
  }

  
  ?>