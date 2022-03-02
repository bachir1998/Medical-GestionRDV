<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'/>
    <link rel='stylesheet' href='luimeme.css'>
    <link rel='stylesheet' href='css/bootstrap.css'/>
    <script src='js/bootstrap.js'></script>
    <script src='jquery-3.4.1.min.js'></script>
	
	<script>
		$(document).ready(function(){
			
			$('.file').click(function(){
				$('.submit').slideDown('slow');
				$('.filee').hide();
			} );
			
		});
	</script>
</head>
<body style="padding-top : 70px;  font-size : 20px; background : #2F4F4F ;margin-left : 7%; margin-right : 7%;">
<div style="background  : white; ">
<nav class="navbar navbar-default bg-blue navbar-fixed-top ">
<div class="container-fluid" style=" margin : 10px;">
<!-- Brand, toggle pour l'affichage en version mobile -->
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#">
    <?php
        if(empty($_SESSION['pp'])){
            if($_SESSION['sexe']=='m')
                $profil='homme.JPG';
            else
                $profil='femme.JPEG';
        }else{
            $profil = $_SESSION['pp'];
        }
        echo '<img style="margin-right : 50%;width : 60px;height: 60px; margin-top : -30%; border-radius : 50%;" src="'.$profil.'"/>';
    ?>
</a>
</div>
<!-- Liens de navigation, formulaires et autres -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
<li ><a href="publier_immeuble.php" >Publier un bien </a></li>
<li class="dropdown">
<a href="chat/formulairechat.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Discussions <span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="#" title="Lien 2.1">Lien 2.1</a></li>
<li><a href="#" title="Lien 2.2">Lien 2.2</a></li>
<li><a href="#" title="Lien 2.3">Lien 2.3</a></li>
<li role="separator" class="divider"></li>
<li><a href="#" title="Lien séparé 1">Lien séparé 1</a></li>
<li role="separator" class="divider"></li>
<li><a href="#" title="Lien séparé 2">Lien séparé 2</a></li>
</ul>
</li>
</ul>
<form class="navbar-form navbar-left">
<div class="form-group">
<input type="text" class="form-control" placeholder="Rechercher">
</div>
<button type="submit" class="btn btn-sm btn-default">OK</button>
</form>
<ul class="nav navbar-nav navbar-right">
<li><a href="#" title="Lien à droite">Lien à droite</a></li>
</ul>
</div><!-- /.navbar-collapse -->

</nav>
    <div class=' lui'>
    <?php
		if(empty($_SESSION['pp'])){
            if($_SESSION['sexe']=='m')
                $profil='homme.JPG';
            else
                $profil='femme.JPEG';
        }else{
            $profil = $_SESSION['pp'];
        }
        echo "<div class='image'><img src='".$profil."'/></div>";
        echo'	<form methode="post" action="luimeme.php" anctype="multipart/form-data">
				<span class="filee btn btn-primary btn-file">
				Modifier le profil <input class="file" type="file">
				</span>
				<input class="submit btn btn-primary" style="display : none;" type="submit" value="Modifier">
				</form>
				</div><hr/>';
        //echo "</br><span><p id='name'>".$_SESSION['prenom']." ".$_SESSION['nom']."</p></span><hr/>"; -->
	
	
		echo "<div id='information'><hr/>";
		echo "<div class='pre pr1'><div class='infor'>Nom : <span class='info'>".$_SESSION['nom']."</span></br></br></div>";
		echo "<div class='infor'>Prenom : <span class='info'>".$_SESSION['prenom']."</span></br></br></div>";
		echo "<div class='infor'>Adresse : <span class='info'>".$_SESSION['adresse']."</span></br></br></div></div>";
		echo "<div class='pre pr'><div class='infor'>Telephone : <span class='info'>".$_SESSION['tel']."</span></br></br></div>";
		echo "<div class='infor'>Email : <span class='info'>".$_SESSION['email']."</span></br></br></div></div>";
		echo"</div>";
		
		// $bdd = new PDO('mysql:host=localhost;dbname=immobilier','root', '');
		// $requete = 'SELECT * FROM biens WHERE idcom = '.$_SESSION['idcom'];
		// $stmt=$bdd->query($requete);
		
		
	?>
	
	</div><!-- /.container-fluid -->
</body>
</html>