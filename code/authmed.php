<?php
	session_start();
?>
<!DOCTYPE html>

<html >
    <head>
    <meta charset="utf-8"/>	
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
	<form method='post' action='authmed.php' class=" formul col-lg-5 login-form" style='box-shadow : 0px 2px 3px black'>
		<fieldset>
			<legend style='font-weight : bold; font-size : 30px;'>Authentification</legend>
            <div class="yes" style='color : green; font-size: 20px; display : none'>Authentification réussie</div>
			<div class="err" style='color : red; font-size: 20px; display : none'>Login ou mot de passe ou matricule incorrect</div>
			<input  class='form-control' type="text" name="email" placeholder='votre em@il'/><br/>
			<input class='form-control' type="password" name="mdp" placeholder='Mot de passe'/><br/>
			<input class='form-control' type="number" name="matricule" placeholder='matricule'/><br/>
			<input   class='sub form-control btn btn-primary' type='submit' value='Se connecter' />
		</fieldset>
		<br/><hr/><br/><span style='margin-left : 35%;;'><a href='inscripmed.php' class=' btn btn-success'>Creer un compte</a></span>
	</form>
</div>

<?php

	$dsn = 'mysql:host=localhost;dbname=medicales';
	$bdd= new PDO($dsn, 'root', '');	
	
	$req='select * from personne where email like ? and mdp like ? and matricule like ?';
	$stmt=$bdd->prepare($req);

	//connexion avec android

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{

	
		if(isset($_POST['email']) and isset($_POST['mdp']) and isset($_POST['matricule'])){
			$conf = 10;
			$email = $_POST['email'];
			$mdp = $_POST['mdp'];
			$matricule = $_POST['matricule'];
			if(!empty($email) and !empty($mdp)){
				$stmt->bindParam(1, $email);
				$stmt->bindParam(2, $mdp);
				$stmt->bindParam(3, $matricule);
				$stmt->execute();
				$t=0;
				$row=$stmt->fetch();
				while($row){
					
					$t=1;
					$_SESSION['email'] = $row['email'];
					$_SESSION['nom'] = $row['nom'];
					$_SESSION['prenom'] = $row['prenom'];
					$_SESSION['age'] = $row['age'];
					$_SESSION['sexe'] = $row['sexe'];
					$_SESSION['nature'] = $row['nature'];
					$conf = $row['conf'];
				
					$row=$stmt->fetch();
				}
				if(($t==1) and ($conf == 1))
				{
					header("Location:medecin.php");
				}
				else if(($t==1) and ($conf == 0))
				{
					echo "<script>
						alert('Désolé votre compte a été désactivé !');
					</script>";
				}
				else
					echo "<script>
							$('.err').slideDown('slow');
						</script>";
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