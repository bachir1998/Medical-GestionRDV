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
                        
                    
                  </form>   
                       <!-- <div class="search-box">
                            <input class="search-text" size="70" type="search" name="" placeholder="Type de recherche">
                            <a class="search-btn" href='#'>
                            <i class="fa fa-search" aria-hidden="true"></i>
                            </a>-->
						     
                </header>
               
					
                <?php
		$dsn = 'mysql:host=localhost;dbname=medicales';
		$bdd= new PDO($dsn, 'root', '');
		$requete = 'select * from image';	// On recupere les biens qui ont des images dans la table `image`
		$urls = $bdd->query($requete);	
		
		//Pour chaque biens, on recupere tout ces images et les affiche en slide border:1px white solid;box-shadow: 0 0 10px #555;
		echo '<div class="container">
		<div class="row justify-content-center">';
		while($url = $urls->fetch()){
			$lien="rv.php?nomservices=".$url['nomservices']."&url=".$url['url'];
			//On affiche les images de ce bien 
			echo '
						<div class="  col-md-3">
							<div class="card shadow"  style="width: 25rem; margin-bottom : 10%;">
								<div class="inner">
									<img  style=" width : 310px;height : 190px;" src="'.$url['url'].'" class="card-img-top " alt="...">
								</div>
							  
							  <div class="card-body text-center" style="height : 15rem;" box-shadow : 0px 2px 3px black>
								<h5 class="card-title" style="height : 4rem;font-weight: bold;font-size:140%;color:lightseagreen">Service '.$url['nomservices'].'</h5>
								<a href='.$lien.' class="btn btn-primary" style="background-color:lightseagreen;border-color:lightseagreen">Plus de details</a>
							  </div>
							</div>
						</div>
			';
		}
		echo '
			</div>
			</div>';
			
        ?>
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
