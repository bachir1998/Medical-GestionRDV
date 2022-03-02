﻿<!DOCTYPE html>

<html >
    <head>
    <meta charset="utf-8" />	
    <link rel="stylesheet" href="../css/tester.css?<?php echo time();?>"/>
    <link rel="stylesheet" href="../css/tester2.css?<?php echo time();?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    rel="stylesheet">
  
    <link rel="stylesheet"  href="../bootstrap/css/bootstrap.css"/>
    <script src="../jquery-3.4.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"> </script> 
        <title>Gestion des RDV</title>
    </head>
    <body>
				<nav class="navbar  navbar-default navbar-fixed-top" >
                    <img style="float: left;width : 40px;height : 40px;margin:0.5%; border : 50%;" src='im_header.PNG' alt="logo"/>
                    <div class="container"  style="margin-right: -18%;margin-top:0%;font-size:120% ; color : white">
                            
                        <ul class="nav navbar-nav">
                            <li >  <a href="accueil.php">Accueil</a> </li>
                            <!--<li  class="dropdown" >  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Publication<span class="caret"></span></a>
                               <ul class="dropdown-menu">
                                    <li><a href="pageAuth.php">Appartement</a></li>
                                    <li class="divider"></li>
                                    <li><a href="pageAuth.php">Immeuble</a></li>
                                    <li class="divider"></li>
                                    <li><a href="pageAuth.php">Villa</a></li>
                                </ul>
                            </li>-->
                            <li>  <a href="#">Services</a></li>
                            <li>  <a href="#">Règles de confidentialité</a></li>
                            <li >  <a href="#">Contact</a></li>

                            <li class="dropdown"  style="left:10%;top: 6px;"  >  <button type="button" style="background-color:lightseagreen;border-color:lightseagreen"  class="btn btn-success dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Se connecter</button>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-header">En tant que:</li>
                                    <li class="divider"></li>
                                    <li><a href="authmed.php">Medecin</a></li>
                                    <li class="divider"></li>
                                    <li><a href="authpat.php">Patient</a></li>
                                </ul>
                            </li>
                         
                            <li class="dropdown" style='left: 18%;top: 6px '>  <button type="button" style="background-color:lightseagreen;border-color:lightseagreen" class="btn btn-success dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">S'inscrire</button>
                                <ul class="dropdown-menu">
                                        <li class="dropdown-header">En tant que:</li>
                                        <li class="divider"></li>
                                        <li><a href="inscripmed.php">Medecin</a></li>
                                        <li class="divider"></li>
                                        <li><a href="inscrippatient.php">Patient</a></li>
                                </ul>
                            </li>                                                                                                    
                        </ul>
                    </div>
                
                </nav>
                <header class="now">
                <h1 style="animation: flash 1.4s linear infinite;margin-top:2%;letter-spacing:5px;text-align:center;">Gestion des RDV</h1>
                <h3  style="text-align:center">La santé avant tout</h3>
              
               <!--<form class="navbar-form navbar-right" style="margin-top:-6%;margin-right:28%" >
                       <div class="form-group">
                           <input type="text" class="form-control" size="50" placeholder="search">
                        </div> 
                        
                        <button type="submit" class="btn btn-primary" style="background-color:lightseagreen;border-color:lightseagreen">Rechercher</button>-->
                        
                    
                   
                       <!-- <div class="search-box">
                            <input class="search-text" size="70" type="search" name="" placeholder="Type de recherche">
                            <a class="search-btn" href='#'>
                            <i class="fa fa-search" aria-hidden="true"></i>
                            </a>-->
						     
                </header>

    <div class="container">
		
		<?php
		if(isset($_GET['nomservices'])){    //On recupere l'url envoyer depuis tester.php
			
            $nomservices = $_GET['nomservices'];
               $v = "e";
            $a= "a";
            $d=date('Y-m-d');
            $h=date('H:i');
			$bdd= new PDO('mysql:host=localhost;dbname=medicales', 'root', '');
			$requete='select * from services s join district d join personne p join rdv r on s.idistrict=d.idistrict and s.idservice = r.idservice and s.idpersonnel=p.email where nomservices="'.$nomservices.'" and r.statut="'.$v.'" and dateRV>="'.$d.'"';
			//$req = 'select * from image,biens,personne where image.idbiens=biens.idbiens and personne.idpers=biens.idcom and biens.idbiens='.$idbiens;
            $st = $bdd->query($requete);
            echo "<div id='lesmedecin'><legend class='btn btn-info'><center>LISTE DE TOUS LES RENDER-VOUS DISPONIBLE</center></legend>";
            echo"<table id='tabl' class='table table-striped table-bordered table-hover'>";
             echo"<strong><thead class='thead-info' style='font-weight:bold'><tr>";
                    echo'<th> Prénom et nom du médecin</th>';
                    echo'<th> Services</th>';
                    echo'<th> District</th>';
                    echo'<th> Date du rendez-vous</th>';
                    echo'<th> Heure du rendez-vous</th>';
                    echo'<th> Commentaire </th>';
                    echo'<th> Statut du rendez-vous</th>';
                    echo'<th> Valider le rendez-vous </th>';
                    echo'</tr></thead></strong>'; 

            echo'<tbody>';        
            while($row = $st->fetch())
            {
				if((($row['dateRV'] == $d )))
				{
				  if($h <= $row['Deb'])
					{
            $y = date('Y',strtotime($row['dateRV']));
            $m = date('F',strtotime($row['dateRV']));
            $j = date('j',strtotime($row['dateRV']));
                    
						echo'<tr style="color:black;">';
							echo"<td><center>".$row['prenom']. " ".$row['nom']."</center></td>";
							echo"<td><center>".$row['nomservices']."</center></td>";
							echo"<td><center>".$row['nomdistrict']."</center></td>";
							echo'<td><center>'.$j.' '.$m.' '.$y.'</center></td>';
							echo"<td><center>".$row['Deb']."</center></td>";
							echo"<td>".$row['commentaire']."</center></td>";
							echo"<td><center> en cours </center></td>";
							
							echo '<form action="authpatservice.php" method="post" >';
							echo'<input type="hidden" name="rv" value='.$row['idrdv'].'>';
							echo"<td><center>";echo'<input  type="submit" class="btn btn-success"  value="VALIDER">';
							echo"</center></td>";
							echo '</form>';
						echo'</tr >';

            
          }
          
				}
				else if(($row['dateRV'] > $d ))
				{
          $y = date('Y',strtotime($row['dateRV']));
            $m = date('F',strtotime($row['dateRV']));
            $j = date('j',strtotime($row['dateRV']));
					echo'<tr style="color:black;">';
						echo"<td><center>".$row['prenom']. " ".$row['nom']."</center></td>";
						echo"<td><center>".$row['nomservices']."</center></td>";
						echo"<td><center>".$row['nomdistrict']."</center></td>";
						echo'<td><center>'.$j.' '.$m.' '.$y.'</center></td>';
						echo"<td><center>".$row['Deb']."</center></td>";
						echo"<td><center>".$row['commentaire']."</center></td>";
						echo"<td><center> en cours </center></td>";
						
						echo '<form action="authpatservice.php" method="post" >';
						echo'<input type="hidden" name="rv" value='.$row['idrdv'].'>';
						echo"<td><center>";echo'<input  type="submit" class="btn btn-success" value="VALIDER">';
						echo"</center></td>";
						echo '</form>';
					echo'</tr >';
				
			 
				}
			
           
            } 
            echo"</tbody></table>";
            echo'</div>';
        }
		?>
     </div>
               
			
              <script>

$(".now").hide(0,'linear')

$(".now").slideDown(1000,'linear');



</script>

        
        
        <footer id="footer" class="foot">
   <div class="footer-top  footer-default">
     <div class="container">
       <div class="row">
           <div class="col-lg-4 col-md-6 footer-info"> 
               <h3 style="animation: flash 1.4s linear infinite"> Obtenez un RV facilement</h3>
               <p> ________ ________ ________ ________ _________
                   ________  _______ _________  _______  _______
                   ________ _________ ___________</p>
            </div>
            <div class="col-lg-2 col-md-6 footer-links">
               <h4> Liens utiles <h4>
                 <ul>
                      <li><a href="#">Link</a></li>
                      <li><a href="#">Link</a></li>
                      <li><a href="#">Link</a></li>
                      <li><a href="#">Link</a></li>
                      <li><a href="#">Link</a></li>
                 </ul>
             </div>
             <div class="col-lg-3 col-md-6 footer-contact"> 
               <h4> Contactez-nous</h4>
                <p>
                  Hann Bel Air   Rue:6 <br/>
                  Hann,  Dakar<br/>
                  Sénégal<br/>
                  <strong>Téléphone:</strong>+221 78 130 45 98<br/> 
                  <strong>Em@il:</strong>BAM@gmail.com<br/>
                 </p>
          
                 <div class="social-links">
                    <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#" class="twitter"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="twitter"><i class="fa fa-instagram"></i></a> 
                    <a href="#" class="twitter"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="twitter"><i class="fa fa-linkedin"></i></a>      
                 </div> 
                 </div>  
                  <div class="col-lg-3 col-md-6 footer-newsletter">
                  <h4>Our Nemsletter</h4>
                   <p> ________ ________ ________ ________ _________
                   ________  _______ _________  _______  _______
                   ________ _________ ___________</p>
                   <form accept="" mthod="post">
                     <input type="email"  name="email"/><input type="submit" value="s'abonner"/>
                    </form>
                 </div>
    
       </div>
     </div>
    </div>
    <div class="container">
      <div class="copyright">
        &copy; Copyright<strong>WebsiteName</strong>. Tout Droits Reservés
       </div>
       <div class="credits">
          Designed by <a href="#">WebsiteName</a>
       </div>
     </div>
</footer>
<script>

$(".foot").hide(0,'linear')

$(".foot").slideDown(1000,'linear');



</script>   
    </body>
    </html>
