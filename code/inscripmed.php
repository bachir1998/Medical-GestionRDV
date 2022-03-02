<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Incsription Medecin</title>
    <link rel="stylesheet" href="../css/styleformulaire.css?<?php echo time();?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script charset="utf-8" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
		rel="stylesheet">
    <link rel="stylesheet"  href="../bootstrap/css/bootstrap.css"/>
    <script src="../jquery-3.4.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"> </script>
    <style>
       .div 
       {
           display: inline-block;
       }
       input[type="submit"]{
            width: 25%;
            font-size:150%;
            
    }
      </style>  
      
</head>
<body>

<nav class="navbar  navbar-default navbar-fixed-top " >
                    <img style="float: left;width : 40px;height : 40px;margin:0.5%; border : 50%;" src='im_header.PNG' alt="logo"/>
                    <div class="container"  style="margin-right: -18%;margin-top:0%;font-size:120% ; color : white">
                            
                        <ul class="nav navbar-nav ">
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

<div class="container"  style="margin-left:17%;">
    <div class="row">
           <div class="col-md-10 offset=md-1">
                   
                   <div class="row design col-lg-12 register-right" style='box-shadow : 0px 0px 5px black'>
                    
                      <h2 style="animation: flash 5.4s linear infinite">Inscription Medecin</h2>
                         <div class="register-form">
                        <form method='post'  action='inscripmed.php' id='form' enctype='multipart/form-data' >
                          <div class="yes" style='color : green; font-size: 20px; display : none'>Inscription réussie</div>
                          <div class="err0" style='color : red; font-size: 20px; display : none'>Veuillez remplir tous les champs </div>
                          <div class="err" style='color : red; font-size: 20px; display : none'>Inscription échouée </div>
                          <div class="err1" style='color : red; font-size: 20px; display : none'>Inscription échouée : le numéro de téléphone et le matricule sont déjà utilisés</div>
                          <div class="err2" style='color : red; font-size: 20px; display : none'>Inscription échouée : le numéro de téléphone est déjà utilisé</div>
                          <div class="err3" style='color : red; font-size: 20px; display : none'>Inscription échouée : le matricule est déjà utilisé</div>
                          <div class="err4" style='color : red; font-size: 20px; display : none'>Inscription échouée : le captcha est invalide</div>
                          <div class="err5" style='color : red; font-size: 20px; display : none'>Inscription échouée : veuillez bien confirmer le mot de passe</div>
                         
                                       
			              
                           
                           <div class="col-lg-6" style="font-size:90%"> 
                           
                           <div class="form-group">
								<input type="text" name='email' value="<?php if(isset($_POST['email'])){echo htmlentities($_POST['email']);}?>" class="form-control" placeholder="adresse em@il" pattern="(^[a-z0-9]+)@([a-z0-9])+(\.)([a-z]{2,4})"/>
                            </div>
                            <br>
                            
							
                            <div class="form-group">
								<input type="password" name='mdp'  value="<?php if(isset($_POST['mdp'])){echo htmlentities($_POST['mdp']);}?>"  class="form-control" placeholder="mot de passe"/>
							</div>
                            <br>
                            
                            <div class="form-group">
								<input type="password" name='confmdp'  value="<?php if(isset($_POST['confmdp'])){echo htmlentities($_POST['confmdp']);}?>" class="form-control" placeholder="confirmer votre mot de passe"/>
                            </div>
                            <br>


							<div class="form-group ">
								<input type="text" name='nom'  value="<?php if(isset($_POST['nom'])){echo htmlentities($_POST['nom']);}?>" class="form-control" placeholder="Nom"/>
                            </div>
                            <br>


                            <div class="form-group">
								<input type="text" name='prenom'  value="<?php if(isset($_POST['prenom'])){echo htmlentities($_POST['prenom']);}?>" class="form-control" placeholder="Prenom"/>
                            </div>
                            <br>

                            <div class="form-group">
								<input type="number" min="19"  name='age'  value="<?php if(isset($_POST['age'])){echo htmlentities($_POST['age']);}?>" class="form-control" placeholder="age"/>
                            </div>
                            <br>


                            <div class="form-group">
                                                           <label style="margin-right:3%;font-size:150%;color:black">SEXE : </label>
                                                             <span style="font-size:150%;color:black">M</span><input style="margin-right:4%" type="radio" name="sexe" value="m"/>
                                                             <span style="font-size:150%;color:black">F</span> <input style="margin-right:4%" type="radio" name="sexe" value="f"/>
                                                           </div>
                                                           <br>
                        
                         <div class="form-group">
								<input type="tel" name='tel' value="<?php if(isset($_POST['tel'])){echo htmlentities($_POST['tel']);}?>" pattern="^7[0,6,7,8][0-9]{3}[0-9]{2}[0-9]{2}" class="form-control" placeholder="telephone"/>
							</div>	
                            <br>

                            <div class="form-group">
								<!--<input type="text" name='nature' class="form-control" placeholder="nature"/> -->
                                <input type="text" name='nature' value="medecin" class="form-control" readonly="readonly" />
							</div>
                            <br>

							
							  
							

                            <div class="form-group">
                            <select class='form-control'  name='nomservice'  value="<?php if(isset($_POST['nomservice'])){echo htmlentities($_POST['nomservice']);}?>">
                                <option value=''>Type de Services</option>
                                <option  value='Odontologie'>Odontologie</option>
                                <option value='Ophtalmologie'>Ophtalmologie</option>
                                <option value='ORL'>ORL</option>
                           </select>
							</div> 
                        </div>
                           <div class="col-lg-6" style="font-size:130%">
                              <div class="form-group">
                              
                               <?php
						             $dsn = 'mysql:host=localhost;dbname=medicales';
                                     $bdd= new PDO($dsn, 'root', '');	
                                     $hopital= 'select * from district';
                                     $stmt2=$bdd->query($hopital);
                                     echo "<div  id='lesmedecin'><legend class='btn btn-info' style='margin-bottom:-33%'><center>LISTE DES HOPITAUX</center></legend>";
                                     echo"<table id='tabl' style='margin-top:-59%' class='table table-striped table-bordered table-hover'>";
                                      echo"<strong><thead class='thead-info' style='font-weight:bold'><tr>";
                                             echo'<th> Noms des Hopitaux</th>';
                                             echo'<th> Choix</th>';
                                             echo'</tr></thead></strong>'; 
                         
                                     echo'<tbody>';        
                                     while($hospi = $stmt2->fetch())
                                     {?>
                                        <span style="font-size:150%;color:black;margin-right:3%"><?php echo'<tr><td>'; echo $hospi['nomdistrict'];echo'</td>';?></span><?php echo'<td>'; ?><input style="margin-right:4%" type="checkbox" name="choice[]" value="<?php echo $hospi['idistrict'] ;?>"/><?php echo'</td></tr>';?><br/>  
                                        
                                    <?php }
                                      echo"</tbody></table></div>";?>	
						
                              
                              
							</div>

                            <div class="form-group">
								<input type="number" name='matricule'  value="<?php if(isset($_POST['matricule'])){echo htmlentities($_POST['matricule']);}?>" class="form-control" placeholder="matricule"/>
                            </div>
                            <br>

                            <div class="form-group">
                                        <label>Veuillez saisir correctement les chiffres ci-dessous</label><br>
                                        <img src="captcha.php" />
                                        <input type="text" name="captcha"   placeholder="saisir les chiffres" />
                            </div>
                            

                            <br>
                            
                            </div>
                            <center><input type='submit'  value='Envoyer' class="btn btn-success " /></center>                    
                        </form>
                        

						
						<?php
						$dsn = 'mysql:host=localhost;dbname=medicales';
						$bdd= new PDO($dsn, 'root', '');		
						
                        $requete = "INSERT INTO personne (email ,mdp,nom,prenom,age,sexe,tel,nature,matricule) VALUES (:email,:mdp,:nom,:prenom,:age,:sexe,:tel,:nature,:matricule)";
                        $req1='INSERT INTO services (`nomservices`, `idpersonnel`, `idistrict`) VALUES (:nomservices,:idpersonnel,:idistrict)';
                        $select='SELECT * from personne';
                        $save = $bdd->query($select);
                        $save1 = $bdd->query($select);
                        	
		
                        //Pour chaque biens, on recupere tout ces images et les affiche en slide border:1px white solid;box-shadow: 0 0 10px #555;
                        
                       
                        
                        
                
                                
                        $stmt1=$bdd->prepare($req1);
                
						
						$stmt=$bdd->prepare($requete);
                        $verif=false;
                        $verif1=false;
                    
						if(isset($_POST['email']) and isset($_POST['mdp']) and isset($_POST['nom']) and  isset($_POST['prenom'])and isset($_POST['age']) and isset($_POST['sexe']) and isset($_POST['tel']) and isset($_POST['nature']) and isset($_POST['nomservice']) and isset($_POST['matricule']) and isset($_POST['captcha'])) {
							$email = $_POST['email'];
							$mdp = $_POST['mdp'];
							$nom = $_POST['nom'];
							$prenom = $_POST['prenom'];
							$age = $_POST['age'];
							$sexe = $_POST['sexe'];
                            $tel=$_POST['tel'];
                            $nature = $_POST['nature'];
							$matricule = $_POST['matricule'];
                            $confmdp = $_POST['confmdp'];
                            $nomservice=$_POST['nomservice'];
                            $captcha=$_POST['captcha'];
                           
							if(!empty($email) and !empty($captcha) and !empty($mdp) and !empty($nom) and !empty($prenom) and !empty($age) and !empty($sexe) and !empty($tel) and !empty($nature) and !empty($matricule) and !empty($confmdp) and !empty($nomservice) ){
                                if($mdp == $confmdp )
                                {
                                    if( $nature == "medecin")
                                    {
                                        if($_POST['captcha'] == $_SESSION['captcha']) {
                                       
                                            while($saves = $save->fetch()){
                                          
                                          
                                       
                                            if($tel==$saves['tel']) 
                                            {
                                                $verif=true;
                                                 break;     
                                        
                                            }
                                            
                                        }

                                        while($saves1 = $save1->fetch()){
                                          
                                          
                                            
                                            if($matricule == $saves1['matricule'])
                                            {
                                                            $verif1=true;
                                                            break;     
                                                    
                                             }
                                                 
                                            
                                            }
                                             
                                        if($verif==true && $verif1==true )
                                        {
                                            echo "<script>
                                            $('.err1').slideDown('slow');
                                            </script>";
                                        }
                                        else if($verif==true && $verif1==false)
                                        {
                                            echo "<script>
                                            $('.err2').slideDown('slow');
                                            </script>";

                                        }
                                        else if($verif1==true && $verif==false )
                                        {
                                            echo "<script>
                                            $('.err3').slideDown('slow');
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
                                            $stmt->bindParam(':matricule', $matricule);
                                            
                                                   
                                            if(isset($_POST['choice']))
                                            {
                                                    foreach($_POST['choice'] as $district){
                                                       
                                                        $stmt1->bindParam(':nomservices', $nomservice);
                                                        $stmt1->bindParam(':idpersonnel', $email);
                                                        $stmt1->bindParam(':idistrict', $district);
                                                        $stmt1->execute();
                                                    }
                                           }
                                           else
                                           echo "erreur";
                    
        
                                            
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
                                        else
                                        {
                                            echo "<script>
                                                        $('.err4').slideDown('slow');
                                                    </script>";
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
                                                
                                        //On remplit les 3 image dans la table image
                                       
                                    
                                
                            }
                          else {
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
<!--
<script>

                $(".design ").hide(0,'linear')

            	$(".design").slideDown(3000,'linear');
					

					
</script>-->
</body>


</html>