<?php
	session_start();
?>

<!DOCTYPE html>

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
    <script src="script.js"> </script>
      
        <title>Gestion des RDV</title>
    </head>
    <body>
				<nav class="navbar  navbar-default navbar-fixed-top" >
                    <img style="float: left;width : 40px;height : 40px;margin:0.5%; border : 50%;" src='im_header.PNG' alt="logo"/>
                    <div class="container"  style="margin-right: -18%;margin-top:0%;font-size:120% ; color : white">
                            
                        <ul class="nav navbar-nav">
                            <li >  <a href="accueil.php">Accueil</a> </li>
                            <li>  <a href="ajouterRV.php">Ajouter RDV</a></li>
                            
                            <li>  <a href="medecin.php">Mes RDV</a></li>
                            
                            <li>  <a class="nav-link" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" 
                                     aria-expanded="false" href="#">Historique RDV</a>
                                <div class="dropdown-menu" arial-labelledby="dropdown01" >
                                  <a class="dropdown-item" href="#">
                                    <small><i>
                                    <?php
                                      $dsn = 'mysql:host=localhost;dbname=medicales';
                                      $bdd= new PDO($dsn, 'root', '');		
                                      
                                      $statut = "v";     
                                      $select = "SELECT * FROM rdv r join personne p join services s on p.email = r.idpatient and s.idservice = r.idservice WHERE r.idpers like ? and r.statut like ? order by dateRV,Deb desc";
                                      $stmt = $bdd -> prepare($select);
                                      $stmt -> execute(array($_SESSION['email'], $statut));

                                      if($stmt->execute())
                                      {
                                        $row = $stmt -> fetch();
                                        $t = 0;
                                        
                                        while($row)
                                        { $t++;
                                          
                                          echo '<article>
                                              <p>'.$row["dateRV"].'</p>
                                              <p>'.$row["Deb"].'</p>
                                              <p>Patient : '.$row["prenom"].' '.$row["nom"].'</p>
                                              <p>'.$row["nomservices"].'</p>
                                              <p>'.$row["commentaire"].'</p>
                                          </article>';
                                          $row = $stmt -> fetch();
                                        }
                                        
                                        
                                      }
                                      else
                                        echo "echec";
                                    ?>
                                    </i></small>
                                  </a>
                                  <div class="dropdown-divider"></div>
                                </div>
                            </li>  </ul>
                            <li><?php
                      $dsn = 'mysql:host=localhost;dbname=medicales';
                      $bdd= new PDO($dsn, 'root', '');		
                      
                                
                      $select = "SELECT * FROM personne  WHERE email like ? ";
                      $stmt = $bdd -> prepare($select);
                      $stmt -> execute(array($_SESSION['email']));

                      if($stmt->execute())
                      {
                        $row = $stmt -> fetch();
                        $t = 0;
                        
                        while($row)
                        { $t++;
                          
                          echo '
                              <span class="badge badge-light">Bonjour '.$row["prenom"].' '.$row["nom"].'</span>';
                          $row = $stmt -> fetch();
                        }
                        
                        
                      }
                      
                    ?></li>                                          
                        
                    </div>
                
                </nav>
                <header class="now">
                <center><h1 style="animation: flash 1.4s linear infinite;margin-top:2%;letter-spacing:5px;margin-left:-10%;">Gestion des RDV</h1>
                <h3  style="margin-left:-8%;">La santé avant tout</h3></center>
              
                  
                </header>
               
              <script>

$(".now").hide(0,'linear')

$(".now").slideDown(1000,'linear');



</script>

<div id='rv'></div>
  <?php
    if(isset($_POST['idrv']) and !empty(['idrv']))
    {
      $idrv = $_POST['idrv'];
      $nom ="das";
      $prenom="samaras";
      $idpatient = "sara";
      $select2 = "SELECT * FROM rdv r join personne p  on r.idpers = p.email WHERE r.idrdv = ? ";
      $stmt2 = $bdd -> prepare($select2);
      $stmt2 -> execute(array($idrv));

      if($stmt2->execute())
      {
        $row2 = $stmt2 -> fetch();
        $t = 0;
        while($row2)
        {
          $t++;
          $nom = $row2["nom"];
          $prenom = $row2["prenom"];
          $idrv = $row2["idrdv"];
          $idpatient = $row2["idpatient"];
          $row2 = $stmt2 -> fetch();
        }

        if($t == 1)
        {
         
          $mes = 'votre rendez-vous avec '.$nom.' '.$prenom.' a ete annuler';

          $notif = "insert into notifications (message, idrdv, lastmdf) values('$mes','$idrv',NOW())";
          $result = $bdd -> exec($notif);
          if($result != 1)
          {
              $mess_erreur1 = $bdd->errorInfo();
              echo "Insertion impossible, code ", $bdd->errorCode(), $mess_erreur1[2];
              echo "<script type = \"text/javascript\">
              alert('ERREUR :".$bdd->errorCode()."')</script>";
          }
          else
          {
            $mes = 'votre rendez-vous avec '.$nom.' '.$prenom.' a ete annuler';
          
            //send mail
            $monsite="sara10diallo@gmail.com";
            $entete='MIME-Version:1.o'."\r\n";
            $entete='Content-type:text/html;charset=utf-8'."\r\n";
            $entete='From: '.$monsite."\r\n";
            
            mail("$idpatient","Notifation RDV",$mes,$entete);

              echo "<script type = \"text/javascript\">
              alert('La notification est enregistrée avec succés')</script>";

              $v = "a";
              
              $req = "update rdv set statut = '$v' where rdv.idrdv = '$idrv'";
              $res = $bdd -> exec($req);
              
          }
        }
        else{
          echo 't est different de 1/'.$t;
        }

      }
      else{
        echo "echec execution";
      }
    
    }
    
    
	?>   
        
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
