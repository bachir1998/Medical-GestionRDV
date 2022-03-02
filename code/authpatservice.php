<?php
	session_start();
?>
<!DOCTYPE html>

<html >
    <head>
    <meta charset="utf-8" />	
    <link rel="stylesheet" href="../css/auth.css"/>
    <script charset="utf-8" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
		rel="stylesheet">
    <link rel="stylesheet"  href="../bootstrap/css/bootstrap.css"/>
    <script src="../jquery-3.4.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"> </script>
    <title>Gestion des produits</title>
    <script>
	</script>
	</head>

    <body>
            
<div class='design col-lg-10' style=' margin-left : 0%;'> 
	<form method='post' action='authpatservice.php' class=" formul col-lg-5 login-form" style='box-shadow : 0px 2px 3px black'>
		<fieldset>
			<legend style='font-weight : bold; font-size : 30px;'>Authentification</legend>
            <div class="yes" style='color : green; font-size: 20px; display : none'>Authentification réussie</div>
			<div class="err" style='color : red; font-size: 20px; display : none'>Echec d'Authentification : login ou mot de passe incorrect!!</div>
			<input  class='form-control' type="text" name="email" placeholder='votre em@il'/><br/>
			<input  class='form-control' type="hidden" name="rv" value='<?php echo $_POST['rv']  ?>'/><br/>
			<input class='form-control' type="password" name="mdp" placeholder='Mot de passe'/><br/>
			<input class='form-control' type="text" style="display : none" name="nature" value="patient" placeholder='nature'/><br/>
			<input   class='sub form-control btn btn-primary' type='submit' value='Se connecter' />
		</fieldset>
		<br/><hr/><br/><span style='margin-left : 35%;;'><a href='inscripmed.php' class=' btn btn-success'>Creer un compte</a></span>
	</form>
</div>



<?php
	 
	 $dsn = 'mysql:host=localhost;dbname=medicales';
	 $connexion = new PDO($dsn, 'root', '');
	$req='select * from personne where email like ? and mdp like ? and nature like ?';
     $stmt=$connexion->prepare($req);
	if(isset($_POST['rv']) and !empty($_POST['rv']) and isset($_POST['email']) and isset($_POST['mdp']) and isset($_POST['nature']))
	{
		
		
		
		$email = $_POST['email'];
		$mdp = $_POST['mdp'];
		$nature = $_POST['nature'];
		$v = "v";
        $rv = $_POST['rv'];
        
		if(!empty($email) and !empty($mdp) and !empty($nature)){
            if($nature=="patient")
             {
                 $stmt->bindParam(1, $email);
                 $stmt->bindParam(2, $mdp);
                 $stmt->bindParam(3, $nature);
                 $stmt->execute();
                 $t=0;
                 while($row=$stmt->fetch()){
                 
                 $t=1;
                 $_SESSION['nom'] = $row['nom'];
                 $_SESSION['prenom'] = $row['prenom'];
                 $_SESSION['age'] = $row['age'];
                 $_SESSION['sexe'] = $row['sexe'];
                 $_SESSION['matricule'] = $row['matricule'];
             
                 break;
             }
         }
       
		
	
		if($t == 1)
		{
			$rdv = "update rdv set idpatient = '$email', statut = '$v' where rdv.idrdv = '$rv'";
			$result = $connexion -> exec($rdv);
			echo "<script>
						
						alert('Votre rendez-vous a été enregistré avec succés.');
						function RedirectionJavascript(){
							document.location.href='Accueil.php';
						}	
					</script>";
					?>
					
					<script>
						function RedirectionJavascript(){
							document.location.href='Accueil.php';
						}
					</script>
					<body onLoad="setTimeout('RedirectionJavascript()',10)">
					</body>
                    <?php	
					
			
					//header("Location:accueil.php");
			
			/*$mess_erreur1 = $connexion->errorInfo();
			echo "rdv non valider, code ", $connexion->errorCode(), $mess_erreur1[2];
			echo "<script type = \"text/javascript\">
			alert('ERREUR :".$connexion->errorCode()."')</script>";*/
		}
		else
		{
			echo "<script>
						$('.err').slideDown('slow');
					</script>";
					//header("Location:authpatservice.php");
					
			/*echo "<script type = \"text/javascript\">
			alert('Le rdv est validé avec succés, le code du rdv est :".$connexion->lastInsertId()."')</script>";
			header("Location:accueil.php");*/
			
		}
		
	}
		
	}

?>
<script type="text/javascript">
        
        $(".txtb input").on("focus",function()
        {
            $(this).addClass("focus"); 
        });

        $(".txtb input").on("blur",function()
        {
            if($(this).val() == "")
            $(this).removeClass("focus"); 
        });


        </script>

<script>

$(".design ").hide(0,'linear')

$(".design").slideDown(3000,'linear');
	

	
</script>
</body>
</html>