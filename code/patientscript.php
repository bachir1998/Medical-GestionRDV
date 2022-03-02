
    <?php
    $dsn = 'mysql:host=localhost;dbname=medicales';
    $bdd= new PDO($dsn, 'root', '');		
    $v = "e";
    $valide="v";
    $d=date('Y-m-d');
    $h=date('H:i');
              
    $select1 = 'select * FROM rdv r join personne p join services s join district d on r.idpers = p.email and r.idservice = s.idservice and s.idistrict = d.idistrict  WHERE r.statut = ?  and dateRV>="'.$d.'"';
    $stmt = $bdd -> prepare($select1);
    $stmt1= $bdd-> prepare($select1);
    $stmt -> execute(array($v));
    $stmt1 -> execute(array($valide));
    //var_dump($stmt1);

    if($stmt->execute())
    {
      $row = $stmt -> fetch();
      $t = 0;
      echo '<div id="mesrv">';
      echo '<center>';
      echo'<div class="container">';
      echo "<div id='lesmedecin'><legend class='btn btn-info'><center>LISTE DES RENDER-VOUS DISPONIBLES</center></legend>";
      echo"<table id='tabl' class='table table-striped table-bordered table-hover'>";
      echo"<strong><thead class='thead-info' style='font-weight:bold'><tr>";
      echo'<th> Prénom et nom du médecin</th>';
      echo'<th> Services</th>';
      echo'<th> District</th>';
      echo'<th> Date du rendez-vous</th>';
      echo'<th> Heure du rendez-vous</th>';
      echo'<th> Valider le rendez-vous </th>';
      echo'</tr></thead></strong>'; 
      while($row)
      { 
        if((($row['dateRV'] == $d )))
        {
          if($h <= $row['Deb'])
          {
             echo'<tr style="font-weight:bold;color:lightseagreen;">
                <td>'.$row["prenom"].' '.$row["nom"].'</td>
                <td>'.$row["nomservices"].' </td>
                <td>'.$row["nomdistrict"].' </td>
                <td>'.$row["dateRV"].' </td>
                <td>'.$row["Deb"].' </td>
                <td>
              <form action="patient.php" method="post" >
                  <input type="hidden" name="rv" value='.$row['idrdv'].'>
                  <input type="submit" class="btn btn-success" value="VALIDER">
                  </form>
                  </td>
                  </tr>';
          
          }
          $row = $stmt -> fetch();
          
        }
        else if((($row['dateRV'] > $d )))
        {
          
             echo'<tr>
                <td>'.$row["prenom"].' '.$row["nom"].'</td>
                <td>'.$row["nomservices"].' </td>
                <td>'.$row["nomdistrict"].' </td>
                <td>'.$row["dateRV"].' </td>
                <td>'.$row["Deb"].' </td>
                <td>
              <form action="patient.php" method="post" >
                  <input type="hidden" name="rv" value='.$row['idrdv'].'>
                  <input type="submit" class="btn btn-success" value="VALIDER">
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
      
    }
    ?>
    
    <?php

   if($stmt1->execute())
    {
      $row1 = $stmt1 -> fetch();
      $t1 = 0;
      echo '<div id="mesrv">';
      echo '<center>';
      echo'<div class="container">';
      echo "<div id='lesmedecin'><legend class='btn btn-info'><center>LISTE DES RENDEZ-VOUS QUE VOUS AVEZ VALIDES</center></legend>";
      echo"<table id='tabl' class='table table-striped table-bordered table-hover'>";
      echo"<strong><thead class='thead-info' style='font-weight:bold'><tr>";
      echo'<th> Prénom et nom du médecin</th>';
      echo'<th> Services</th>';
      echo'<th> District</th>';
      echo'<th> Date du rendez-vous</th>';
      echo'<th> Heure du rendez-vous</th>';
      echo'<th> Annuler le rendez-vous </th>';
      echo'</tr></thead></strong>'; 
      while($row1)
      { 
        if((($row1['dateRV'] == $d )))
        {
          if($h <= $row1['Deb'])
          {
             echo'<tr>
                <td>'.$row1["prenom"].' '.$row1["nom"].'</td>
                <td>'.$row1["nomservices"].' </td>
                <td>'.$row1["nomdistrict"].' </td>
                <td>'.$row1["dateRV"].' </td>
                <td>'.$row1["Deb"].' </td>
                <td>
              <form action="patient.php" method="post" >
                  <input type="hidden" name="idrv" value='.$row1['idrdv'].'>
                  <input type="submit" class="btn btn-danger" value="ANNULER">
                  </form>
                  </td>
                  </tr>';
          
          }
          $row1 = $stmt1 -> fetch();
          
        }
        else if((($row1['dateRV'] > $d )))
        {
          
             echo'<tr>
                <td>'.$row1["prenom"].' '.$row1["nom"].'</td>
                <td>'.$row1["nomservices"].' </td>
                <td>'.$row1["nomdistrict"].' </td>
                <td>'.$row1["dateRV"].' </td>
                <td>'.$row1["Deb"].' </td>
                <td>
              <form action="patient.php" method="post" >
                  <input type="hidden" name="idrv" value='.$row1['idrdv'].'>
                  <input class="btn btn-danger" type="submit" value="ANNULER">
                  </form>
                  </td>
                  </tr>';
          
          
          $row1 = $stmt1 -> fetch();
          
        }
        else
        {
          $row1 = $stmt1 -> fetch();
        }
        
      
      }
      echo'</tbody></table>';
      echo'</div>';
     echo'</div>';
      
    }
    ?>  
  

