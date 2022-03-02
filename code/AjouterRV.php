<?php
	session_start();
?>

<!DOCTYPE html>

<html>
    <head>
    <meta charset="utf-8" />	
    <link rel="stylesheet" href="../css/tester.css?<?php echo time();?>"/>
    <link rel="stylesheet" href="../css/tester2.css?<?php echo time();?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.4/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    rel="stylesheet">
  
    <link rel="stylesheet"  href="../bootstrap/css/bootstrap.css"/>
    <script src="../jquery-3.4.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"> </script>
      
        <title>Gestion des RDV</title>

        <style>
        .contact-form{
            /*background: rgba(0,0,0, .6);
            */color: black;
            
            margin-top:100px;
            box-shadow: 0px 0px 10px grey;
            padding:25px;
        }
        hr
        {
            background: white;
        }
        address 
        {
            text-shadow: 0px 0px 10px grey;
            font-size:120%;
        }
        p 
        {
            font-weight:bold;
        }
        label 
        {
            font-size:150%;
        }
        
</style>
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
                      else
                        echo "echec";
                    ?></li>
                    </div>
                
                </nav>
               
                <div class="container contact-form ">
                    <h1  style="animation: brille 5.4s linear infinite">Ajouter Rendez-vous</h1>
                    <hr>

                    <div class="row">
                    <div class="col-md-6">
                        <address >SITE DE GESTION DES RDV MEDICAUX</address>
                        <p>Espace privé</p>
                        
                        
                    </div>

                    <div class="col-md-6">
                   
                       <form action="" method="post" > 
                        
                          <div class="form-group">
                             <label for="date">Date  </label>
                             <input type="date" id="date" class="form-control"  name="date" min="<?php $d=date('Y-m-d'); echo$d; ?>" >
                                
                            </div>
                            <br>
                            <br>
                            <br>

                            <div class="form-group">
                                 
                                   <label for="temp">debut RDV  </label>
                                   <input type="time" id="temp" class="form-control" name="temp" value="09:00" min="09:00" max="18:00" step="900">
                                    
                                </div>
                                <br>
                                <br>

                                
                                <div class="form-group">
                                        <label >Commentaire</label>
                                        <textarea class="form-control" rows="5" name="commentaire" id="" cols="10"></textarea>
                                    </div>
                                    <br>
                                    <br>
                                

                                <!-- verifier-->

                                <?php 
                                        $dsn = 'mysql:host=localhost;dbname=medicales';
                                        $bdd= new PDO($dsn, 'root', '');
                                        $nomservices = "rtyuio";
                                        $select1 = 'select * from services where idpersonnel like ? limit 1';
                                        $stm1 = $bdd -> prepare($select1);
                                        $stm1 -> execute(array($_SESSION['email']));

                                        if($stm1->execute())
                                        {
                                            $row1 = $stm1 -> fetch();
                                            $t = 0;
                                            while($row1)
                                            {
                                                $nomservices = $row1['nomservices'];
                                                $t++;
                                                $row1 = $stm1 -> fetch();
                                            }
                                            if($t == 1)
                                            {

                                                
                                                echo '<div class="form-group"><label for="ser">Service : </label>
                                                <input type="text" id="ser" class="form-control" name="service" value='.$nomservices.' readonly ></p>';
                                            }
                                        }
                                            $select2 = 'select * from services s join district d on s.idistrict = d.idistrict where s.idpersonnel like ? ';
                                            $stmt = $bdd -> prepare($select2);
                                            $stmt -> execute(array($_SESSION['email']));

                                            if($stmt->execute())
                                            {
                                                $row = $stmt -> fetch();
                                                
                                               
                                            
                                                echo '<div class="form-group">
                                                      <label >Hopital</label>
                                                      <select style="color:black" name="hopital">';
                                                while($row)
                                                {
                                                    echo '<option  style="color:black" value='.$row["nomdistrict"].'>'.$row["nomdistrict"].'</option>';
                                                    
                                                    $row = $stmt -> fetch();
                                                }
                                                echo '</select> </div>';
                                            } 
                                   ?>
                                   <br>
                                   <br>
           
                                        <div class="form-group">
                                        <button class="btn btn-primary ">Envoyer</button>
                                        </div>
                        </form>  
                        <br>
                                   <br> 
                        
                    </div>
                    </div>
                    
                </div>
    </div>
        
            
            
          
          
        

        <?php 
            if((isset($_POST["date"])) and (isset($_POST["service"])) and (isset($_POST["hopital"])) and (isset($_POST["temp"])) and (isset($_POST["commentaire"])))
            {
               
                
                $idpers = $_SESSION['email'];
                $idservice = 0;
                $service = $_POST["service"];
                $hopital = $_POST["hopital"];
                $date = $_POST["date"];
                $periode = $_POST["temp"];
                $commentaire = $_POST["commentaire"];
                
               
                $dsn = 'mysql:host=localhost;dbname=medicales';
                $connexion = new PDO($dsn, 'root', '');
                
                //on recupere les dates des rdv
                $verify = false;
                $requete = "select * from rdv";
                $res = $bdd -> query($requete);
                
                $ligne = $res -> fetch();
                while($ligne)
                {
                    if(($idpers == $ligne['idpers']) and ((strtotime($date)) == (strtotime($ligne['dateRV']))) and ((strtotime($periode)) == (strtotime($ligne['Deb']))))
                    {
                        $verify = true;
                        break;
                    }
                    else
                        $ligne = $res -> fetch();
                }

                echo $verify;
                if($verify == true)
                {
                    echo "vous avez déjà un rdv à cette periode <br> " ;
                }
                else
                {
                    //recuperation de l'id service
                    $select2 = 'select * from services s join district d on s.idistrict = d.idistrict where s.idpersonnel like ? and s.nomservices like ? and d.nomdistrict like ? ';
                    $stmt = $connexion -> prepare($select2);
                    $stmt -> execute(array(
                    $idpers,
                    $service,
                    $hopital
                    ));

                    if($stmt->execute())
                    {
                        $row = $stmt -> fetch();
                        
                        while($row)
                        {
                            
                            $idservice = $row['idservice'];
                            $row = $stmt -> fetch();
                        }
                    
                    //insertion du rdv
                        $req = "insert into rdv (commentaire,dateRV,Deb,idpers,idservice)
                                values ('$commentaire','$date','$periode','$idpers','$idservice')";
                                $result = $connexion -> exec($req);
                        if($result != 1)
                        {
                            $mess_erreur1 = $connexion->errorInfo();
                            echo "Insertion impossible, code ", $connexion->errorCode(), $mess_erreur1[2];
                            echo "<script type = \"text/javascript\">
                            alert('ERREUR :".$connexion->errorCode()."')</script>";
                        }
                        else
                        {
                            echo "<script type = \"text/javascript\">
                            alert('Le rdv est enregistré avec succés, le code du rdv est :".$connexion->lastInsertId()."')</script>";
                        }
                    }
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

$(".foot").hide(0,'linear');

$(".foot").slideDown(1000,'linear');



</script>   
</body>
</html>