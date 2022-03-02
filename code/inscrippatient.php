<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Incsription Patient</title>
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

                            <li class="dropdown"  style="left:10%;top: 6px;"  >  <button type="button"  class="btn btn-success dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Se connecter</button>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-header">En tant que:</li>
                                    <li class="divider"></li>
                                    <li><a href="authmed.php">Medecin</a></li>
                                    <li class="divider"></li>
                                    <li><a href="authpat.php">Patient</a></li>
                                </ul>
                            </li>
                         
                            <li class="dropdown" style='left: 18%;top: 6px '>  <button type="button"  class="btn btn-success dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">S'inscrire</button>
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




                <div id="contenu">          

<div class="container" style="margin-left:22%">
    <div class="row">
           <div class="col-md-10 offset=md-1">
                
                   
                   <div class="row  design col-lg-10 register-right"  style='box-shadow : 0px 0px 5px black'>
                      <h2 style="animation: flash 5.4s linear infinite" >Incsription Patient</h2>
                         <div class="register-form">
                        <form method='post' action='inscrippatient.php' id='form' enctype='multipart/form-data'>

                        <div class="yes" style='color : green; font-size: 20px; display : none'>Inscription réussie</div>
                          <div class="err" style='color : red; font-size: 20px; display : none'>Inscription échouée </div>
                           <div class="err0" style='color : red; font-size: 20px; display : none'>Veuillez remplir tous les champs </div>
                           <div class="err2" style='color : red; font-size: 20px; display : none'>Inscription échouée : le numéro de téléphone est déjà utilisé</div>
                          
                            <div class="err4" style='color : red; font-size: 20px; display : none'>Inscription échouée : le captcha est invalide</div>
                            <div class="err5" style='color : red; font-size: 20px; display : none'>Inscription échouée : veuillez bien confirmer le mot de passe</div>
							<div class="form-group">
								<input type="text" name='email' value="<?php if(isset($_POST['email'])){echo htmlentities($_POST['email']);}?>" class="form-control" placeholder="adresse em@il" pattern="(^[a-z0-9]+)@([a-z0-9])+(\.)([a-z]{2,4})"/>
							</div>
							
                            <div class="form-group">
								<input type="password" name='mdp' value="<?php if(isset($_POST['mdp'])){echo htmlentities($_POST['mdp']);}?>"  class="form-control" placeholder="mot de passe"/>
							</div>

                            <div class="form-group">
								<input type="password" name='confmdp' value="<?php if(isset($_POST['confmdp'])){echo htmlentities($_POST['confmdp']);}?>" class="form-control" placeholder="confirmer votre mot de passe"/>
							</div>

							<div class="form-group">
								<input type="text" name='nom' value="<?php if(isset($_POST['nom'])){echo htmlentities($_POST['nom']);}?>" class="form-control" placeholder="Nom"/>
							</div>

                            <div class="form-group">
								<input type="text" name='prenom' value="<?php if(isset($_POST['prenom'])){echo htmlentities($_POST['prenom']);}?>"  class="form-control" placeholder="Prenom"/>
							</div>
                            <div class="form-group">
								<input type="number" min="19" name='age' value="<?php if(isset($_POST['age'])){echo htmlentities($_POST['age']);}?>" class="form-control" placeholder="age"/>
							</div>

                            <div class="form-group">
                                <label style="margin-right:3%;font-size:150%;color:black">SEXE : </label>
                                <span style="font-size:150%;color:black">M</span><input style="margin-right:4%" type="radio" name="sexe"  value="m"/>
                                <span style="font-size:150%;color:black">F</span> <input style="margin-right:4%" type="radio" name="sexe" value="f"/>
                            </div>
							
                            <div class="form-group">
								<input type="number" name='tel'   value="<?php if(isset($_POST['tel'])){echo htmlentities($_POST['tel']);}?>" pattern="^7[0,6,7,8][0-9]{3}[0-9]{2}[0-9]{2}"  class="form-control" placeholder="telephone"/>
							</div>

                            <div class="form-group">
                            <input type="text" name='nature' value="patient" class="form-control" readonly="readonly" />
                            </div>
                            
                            <div class="form-group">
                                        <label>Veuillez saisir correctement les chiffres ci-dessous</label><br>
                                        <img src="captcha.php" />
                                        <input type="text" name="captcha" value="<?php if(isset($_POST['captcha'])){echo htmlentities($_POST['captcha']);}?>" placeholder="saisir les chiffres" />
                            </div>

							
							  
							
                            <center><input type='submit'  value='Envoyer' class="btn btn-success " /></center> 
						  </form>

						
						<?php
						$dsn = 'mysql:host=localhost;dbname=medicales';
						$bdd= new PDO($dsn, 'root', '');		
						
						$requete = "INSERT INTO personne (email,mdp,nom,prenom,age,sexe,tel,nature,conf) VALUES (:email,:mdp,:nom,:prenom,:age,:sexe,:tel,:nature,:conf)";
						
                        $stmt=$bdd->prepare($requete);
                        $select='SELECT * from personne';
                        $save = $bdd->query($select);
                        $verif=false;
						
						if( isset($_POST['captcha']) and isset($_POST['email']) and isset($_POST['tel']) and isset($_POST['mdp']) and isset($_POST['nom']) and  isset($_POST['prenom'])and isset($_POST['age']) and isset($_POST['sexe']) and isset($_POST['nature']) ) {
							$email = $_POST['email'];
							$mdp = $_POST['mdp'];
							$nom = $_POST['nom'];
							$prenom = $_POST['prenom'];
							$age = $_POST['age'];
                            $sexe = $_POST['sexe'];
                            $tel = $_POST['tel'];
							$nature = $_POST['nature'];
                            $confmdp = $_POST['confmdp'];
                            $captcha= $_POST['captcha'];
                            $conf = 1;
							if(!empty($email) and !empty($captcha) and !empty($tel) and !empty($mdp) and !empty($nom) and !empty($prenom) and !empty($age) and !empty($sexe) and !empty($nature) and !empty($confmdp) ){
                                if($mdp == $confmdp )
                                {
                                    
                                    if( $nature == "patient")
                                    {
                                        if($_POST['captcha'] == $_SESSION['captcha']) {

                                            while($saves = $save->fetch()){
                                          
                                          
                                       
                                                if($tel==$saves['tel']) 
                                                {
                                                    $verif=true;
                                                     break;     
                                            
                                                }
                                                
                                            }

                                            if($verif==true)
                                            {
                                                echo "<script>
                                                $('.err2').slideDown('slow');
                                                </script>";
    
                                            }
                                            else
                                            {

                                                $stmt->bindParam(':email', $email);
                                                $stmt->bindParam(':mdp', $mdp);
                                                $stmt->bindParam(':nom', $nom);
                                                $stmt->bindParam(':prenom', $prenom);
                                                
                                                $stmt->bindParam(':age', $age);
                                                $stmt->bindParam(':sexe', $sexe);
                                                $stmt->bindParam(':tel', $tel);
                                                $stmt->bindParam(':nature', $nature);
                                                $stmt->bindParam(':conf', $conf);
                                    
                                

                                        
                                                if($stmt->execute())
                                                {
                                                    echo "<script>
                                                                            $('.yes').slideDown('slow');
                                                                        </script>";
                                                }
                                                else
                                                {
                                                    echo "<script>
                                                                            $('.err').slideDown('slow');
                                                                        </script>";
                                                }
                                            }   
                                        }
                                        else{
                                            {
                                                echo "<script>
                                                            $('.err4').slideDown('slow');
                                                        </script>";
                                            } 
                                        }     
                                    }
                                    else{
                                        echo 'nature inconnue';
                                    }
                                 }
                                 
                                 
                                 else{
									echo "<script>
                                                            $('.err5').slideDown('slow');
                                                        </script>";
								}
							}else{
								echo "<script>
                                                            $('.err0').slideDown('slow');
                                                        </script>";
							}
						}
						
						?>
			
				</div>
			</div>
		</div>
	</div>
</div>

<!--<script>

                $(".design ").hide(0,'linear')

            	$(".design").slideDown('slow');
					

					
</script>
                    -->
</body>


</html>