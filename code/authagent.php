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
	<form method='post' action='authagent.php' class=" formul col-lg-5 login-form" style='box-shadow : 0px 2px 3px black'>
		<fieldset>
			<legend style='font-weight : bold; font-size : 30px;'>Authentification</legend>
            <div class="yes" style='color : green; font-size: 20px; display : none'>Authentification réussie</div>
			<div class="err" style='color : red; font-size: 20px; display : none'>Login ou mot de passe ou matricule incorrect</div>
			<input  class='form-control' type="text" name="login" placeholder='votre login'/><br/>
			<input class='form-control' type="password" name="mdp" placeholder='Mot de passe'/><br/>
			<input   class='sub form-control btn btn-primary' type='submit' value='Se connecter' />
		</fieldset>
		<br/><hr/><br/><span style='margin-left : 35%;;'><a href='inscripmed.php' class=' btn btn-success'>Creer un compte</a></span>
	</form>
</div>

<?php

	$dsn = 'mysql:host=localhost;dbname=medicales';
	$bdd= new PDO($dsn, 'root', '');	
	
	$req='select * from agent where logins like ? and mdp like ?';
	$stmt=$bdd->prepare($req);
	
	if(isset($_POST['login']) and isset($_POST['mdp'])){
		$login=$_POST['login'];
		$mdp = $_POST['mdp'];
		$matricule = $_POST['matricule'];
		if(!empty($login) and !empty($mdp)){
			$stmt->bindParam(1, $login);
			$stmt->bindParam(2, $mdp);
			$stmt->execute();
			$t=0;
			$row=$stmt->fetch();
			while($row){
				
				$t=1;
				$_SESSION['login'] = $row['logins'];
				$_SESSION['nom'] = $row['nom'];
                $_SESSION['prenom'] = $row['prenom'];
                $_SESSION['age'] = $row['age'];
				$_SESSION['sexe'] = $row['sexe'];
				
			
				$row=$stmt->fetch();
			}
			if($t==1)
            {
				header("Location:agent.php");
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