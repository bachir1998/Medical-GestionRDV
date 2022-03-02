<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Incsription Personnel</title>
    <link rel="stylesheet" href="../css/styleformulaire.css?<?php echo time();?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
		rel="stylesheet">
    <link rel="stylesheet"  href="../bootstrap/css/bootstrap.css"/>
    <script src="../jquery-3.4.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"> </script>
      
</head>
<body>
<nav class="navbar  navbar-default navbar-fixed-top" >
                    <img style="float: left;width : 40px;height : 40px;margin:0.5%; border : 50%;" src='im_header.PNG' alt="logo"/>
                    <div class="container"  style="margin-right: -18%;margin-top:0%;font-size:120% ; color : white">
                            
                        <ul class="nav navbar-nav">
                            <li >  <a href="tester.php">Accueil</a> </li>
                            <li  class="dropdown" >  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Publication<span class="caret"></span></a>
                               <ul class="dropdown-menu">
                                    <li><a href="pageAuth.php">Appartement</a></li>
                                    <li class="divider"></li>
                                    <li><a href="pageAuth.php">Immeuble</a></li>
                                    <li class="divider"></li>
                                    <li><a href="pageAuth.php">Villa</a></li>
                                </ul>
                            </li>
                            <li>  <a href="tester.html">Règles de confidentialité</a></li>
                            <li >  <a href="tester.php">Contact</a></li>

                            <li class="dropdown"  style="left:10%;top: 6px;"  >  <button type="button"  class="btn btn-success dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Se connecter</button>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-header">En tant que:</li>
                                    <li class="divider"></li>
                                    <li><a href="pageAuth.php">Commercial</a></li>
                                    <li class="divider"></li>
                                    <li><a href="loginclient.php">Client</a></li>
                                </ul>
                            </li>
                         
                            <li class="dropdown" style='left: 18%;top: 6px '>  <button type="button"  class="btn btn-success dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">S'inscrire</button>
                                <ul class="dropdown-menu">
                                        <li class="dropdown-header">En tant que:</li>
                                        <li class="divider"></li>
                                        <li><a href="inscriptioncommerciale.php">Commercial</a></li>
                                        <li class="divider"></li>
                                        <li><a href="inscriptionclient.php">Client</a></li>
                                </ul>
                            </li>                                                                                                    
                        </ul>
                    </div>
                
                </nav>    




                <div id="contenu">          

<div class="container" style="margin-right:2%">
    <div class="row">
           <div class="col-md-10 offset=md-1">
                <div class="col-md-5 register-left">
                      <img src="fleche.png"/>
                      <h3>Nous Joindre</h3>
                      <p>Subscribe Easy Agency</p> 
                      <button type="button" class="btn btn-primary">About us</button>
                </div>
                   
                   <div class="col-md-7 register-right">
                      <h2>Incsription Personnel</h2>
                         <div class="register-form">
						<form method='post' action='inscripperso.php' id='form' enctype='multipart/form-data'>
							<div class="form-group">
								<input type="text" name='email' class="form-control" placeholder="adresse em@il"/>
							</div>
							
                            <div class="form-group">
								<input type="password" name='mdp' class="form-control" placeholder="mot de passe"/>
							</div>

                            <div class="form-group">
								<input type="password" name='confmdp' class="form-control" placeholder="confirmer votre mot de passe"/>
							</div>

							<div class="form-group">
								<input type="text" name='nom' class="form-control" placeholder="Nom"/>
							</div>

                            <div class="form-group">
								<input type="text" name='prenom' class="form-control" placeholder="Prenom"/>
							</div>
                            <div class="form-group">
								<input type="number" min="19" name='age' class="form-control" placeholder="age"/>
							</div>

                            <div class="form-group">
                                                           <label style="margin-right:3%;font-size:150%;color:black">SEXE : </label>
                                                             <span style="font-size:150%;color:black">M</span><input style="margin-right:4%" type="radio" name="sexe" value="m"/>
                                                             <span style="font-size:150%;color:black">F</span> <input style="margin-right:4%" type="radio" name="sexe" value="f"/>
                                                           </div>
							
                            <div class="form-group">
								<input type="text" name='nature' class="form-control" placeholder="nature"/>
							</div>

							
							  
							<div class="form-group">
								<input type="number" name='matricule' class="form-control" placeholder="matricule"/>
							</div>
                            <input type='submit' style="float:right" value='Envoyer' class="btn btn-success"/>
						  </form>

						
						<?php
						$dsn = 'mysql:host=localhost;dbname=medicale';
						$bdd= new PDO($dsn, 'root', '');		
						
						$requete = "INSERT INTO personne (email,mdp,nom,prenom,age,sexe,nature,matricule) VALUES (:email,:mdp,:nom,:prenom,:age,:sexe,:nature,:matricule)";
						
						$stmt=$bdd->prepare($requete);
						
						if(isset($_POST['email']) and isset($_POST['mdp']) and isset($_POST['nom']) and  isset($_POST['prenom'])and isset($_POST['age']) and isset($_POST['sexe']) and isset($_POST['nature']) and isset($_POST['matricule'])) {
							$email = $_POST['email'];
							$mdp = $_POST['mdp'];
							$nom = $_POST['nom'];
							$prenom = $_POST['prenom'];
							$age = $_POST['age'];
							$sexe = $_POST['sexe'];
							$nature = $_POST['nature'];
							$matricule = $_POST['matricule'];
							$confmdp = $_POST['confmdp'];
							if(!empty($email) and !empty($mdp) and !empty($nom) and !empty($prenom) and !empty($age) and !empty($sexe) and !empty($nature) and !empty($matricule) and !empty($confmdp) ){
                                if($mdp == $confmdp )
                                {
                                    if( $nature == "medecin" || $nature == "assistant" || $nature == "patient")
                                    {
									$stmt->bindParam(':email', $email);
									$stmt->bindParam(':mdp', $mdp);
									$stmt->bindParam(':nom', $nom);
									$stmt->bindParam(':prenom', $prenom);
									
									$stmt->bindParam(':age', $age);
									$stmt->bindParam(':sexe', $sexe);
									$stmt->bindParam(':nature', $nature);
									$stmt->bindParam(':matricule', $matricule);
							

									
									if($stmt->execute())
										echo 'insertion reussie';
									else
										echo 'Insertion echouée !!!!';
                                    }
                                    else{
                                        echo 'nature inconnue';
                                    }
                                 }
                                 
                                 
                                 else{
									echo 'Veuillez bien confirmer le mot de passe';
								}
							}else{
								echo 'Veuillez remplir tous les champs';
							}
						}
						
						?>
			
				</div>
			</div>
		</div>
	</div>
</div>


</body>


</html>