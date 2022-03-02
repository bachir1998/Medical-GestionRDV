<?php
	session_start();
?>
<!DOCTYPE html>

<html >
    <head>
    <meta charset="utf-8" />	
    <link rel="stylesheet" href="../css/auth.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet"  href="../bootstrap/css/bootstrap.css"/>
    <script src="../jquery-3.4.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"> </script>
    <title>Gestion des produits</title>
    <script>
	</script>
	</head>F

    <body>
            
<div class='design col-lg-10' style=' margin-left : 0%;'> 
	<form method='post' action='authpat.php' class=" formul col-lg-5 login-form" style='box-shadow : 0px 2px 3px black'>
		<fieldset>
			<legend style='font-weight : bold; font-size : 30px;'>Authentification</legend>
            <div class="yes" style='color : green; font-size: 20px; display : none'>Authentification réussie</div>
			<div class="err" style='color : red; font-size: 20px; display : none'>Login ou mot de passe ou matricule incorrect</div>
			<input  class='form-control' type="text" name="email" placeholder='votre em@il'/><br/>
			<input class='form-control' type="password" name="mdp" placeholder='Mot de passe'/><br/>
			<input class='form-control' type="text" style="display : none" name="nature" value="patient" placeholder='nature'/><br/>
			<input   class='sub form-control btn btn-primary' type='submit' value='Se connecter' />
		</fieldset>
		<br/><hr/><br/><span style='margin-left : 35%;;'><a href='inscripmed.php' class=' btn btn-success'>Creer un compte</a></span>
	</form>
</div>

<?php

	$dsn = 'mysql:host=localhost;dbname=medicales';
	$bdd= new PDO($dsn, 'root', '');	
	
	$req='select * from personne where email like ? and mdp like ? and nature like ?';
	$stmt=$bdd->prepare($req);
	
	if(isset($_POST['email']) and isset($_POST['mdp']) and isset($_POST['nature'])){
		$conf = 10;
		$email=$_POST['email'];
		$mdp = $_POST['mdp'];
		$nature = $_POST['nature'];
		if(!empty($email) and !empty($mdp) and !empty($nature)){
		   if($nature=="patient")
		    {
				$stmt->bindParam(1, $email);
				$stmt->bindParam(2, $mdp);
				$stmt->bindParam(3, $nature);
				$stmt->execute();
				$t=0;
				while($row=$stmt->fetch()){
				
				$t++;
				$_SESSION['email'] = $row['email'];
				$_SESSION['nom'] = $row['nom'];
                $_SESSION['prenom'] = $row['prenom'];
                $_SESSION['age'] = $row['age'];
				$_SESSION['sexe'] = $row['sexe'];
				$_SESSION['matricule'] = $row['matricule'];
				$conf = $row['conf'];
			
				break;
			}
		}
			if(($t==1) and ($conf == 1))
			{
				header("Location:patient.php");
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