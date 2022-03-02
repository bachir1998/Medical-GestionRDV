<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'/>
    <link rel='stylesheet' href='../css/luimeme.css'>
    <link rel='stylesheet' href='../css/publier_immeuble.css'>
    <link rel='stylesheet' href='../css1/bootstrap.css'/>
    <script src='js/bootstrap.js'></script>
    <script src='jquery-3.4.1.min.js'></script>
</head>
<body style="padding-top : 70px;  font-size : 20px; background : #2F4F4F ;margin-left : 7%; margin-right : 7%;">
<nav class="navbar navbar-default navbar-default navbar-fixed-top ">
<div class="container-fluid" style=" margin : 10px;">
<!-- Brand, toggle pour l'affichage en version mobile -->
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="luimeme.php">
    <?php
        if(empty($_SESSION['pp'])){
            if($_SESSION['sexe']=='m')
                $profil='../image/homme.JPG';
            else
                $profil='../image/femme.JPEG';
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
    
	</div><!-- /.container-fluid -->
	
	
	
	<?php		//Traitement du formulaire
	// ===========================================================================================================================================
	Function valid_extension($file){	//Fonction de verififcation de l'extension
		$tab=array("jpg", "png", "jpeg", "gif");
		$ext=strtolower(substr(strrchr($file,'.'),1));
		if(in_array($ext,$tab))
			return true;
		return false;
	}
	Function max_size($file){	 //Fonction de verifcation de la taill du fichier
		if(isset($_POST['$file']['MAX_FILE_SIZE'])){
			$maxsize=$_POST['MAX_FILE_SIZE'];
		if($file['size']<=$maxsize)
			return true;
		return false;
		}
	}
	Function move_file($sourcefile, $destpath, $destname){	// Fonction de deplacement du fichier
		if(!(is_dir($destpath)))
			mkdir($destpath);
		$dest=$destpath."/".$destname;
		$destname=$destname;
		$dest=$destpath."/".$destname;
		move_uploaded_file($sourcefile, $dest);                                
		return $dest;
	}
	Function faire(){
		$tab = array();
		for($i=0;$i<3;$i++){
			if(isset($_FILES['tof'.$i])){
				if($_FILES['tof'.$i]['error']==0){		// Si le fichier a été bien envoyé
					$file=$_FILES['tof'.$i];
					$file_name=$file['name'];
					if(valid_extension($file_name)){		// Si l'extension est valide
						if(move_file($file['tmp_name'], "tofs_server",$file['name'])){      // Si le deplacement du fichier a reussi
							$d=move_file($file['tmp_name'], "tofs_server",$file['name']);
							// On retourne la destination du produit
							$tab[] =  $d;
						}
					}
					else{
						echo "Votre extension n'est pas valid</br> Veuillez choisir une image svp";
					}
				}
				else{
					echo "Une erreur s'est produit lors de votre téléchagement</br>Veuillez reessayer ultérieurement";
				}
			}
		}
		return $tab;
	}
?>
<form class='col-lg-12 'method='post' action='publier_immeuble.php' enctype='multipart/form-data'>
	<fieldset>
	<legend>Publication de biens</legend>
	<div class='row'>
		<div class='col-xs-6'>
			<select class='form-control' name='type'>
				<option value=''>Type de bien</option>
				<option value='appartement'>Appartement</option>
				<option value='immeuble'>Immeuble</option>
				<option value='villa'>Villa</option>
			</select>

			</br><input class='form-control' type='text' name='nombien' placeholder="Nom de l'immeuble"/>
			</br><input class='form-control' type='number' name='nbetage' placeholder='Nb etages'/>
			
			</br><select class='form-control' name='ville'>
				<option value=''>Ville</option>
				<option value=1>Dakar</option>
				<option value=2>Thies</option>
				<option value=3>Kaolack</option>
				<option value=4>Saint-Louis</option>
				<option value=5>Ziguinchor</option>
				<option value=6>Mbour</option>
				<option value=7>Diourbel</option>
			</select>
			</br><input class='form-control' type='number' name='prix' placeholder='prix'/>
			</br><input class='form-control' type='text' name='quartier' placeholder='Quartier'/>
		</div>
		<div class='col-xs-6'>
			<textarea class='form-control' type='textarea' rows='5' name='description' placeholder='Description' ></textarea></br>
			<span style='font-weight : bold; margin-bottom : 1px;'>Ajouter des photos</span>
			<input class='form-control' type='file' name='tof0' />
			</br><input class='form-control' type='file' name='tof1' />
			</br><input class='form-control' type='file' name='tof2' />
		</div>
	</div>
	</br><button class='btn btn-primary' type='submit'>Publication</button>
	</fieldset>
</form>

<?php
	$dsn = 'mysql:host=localhost;dbname=immobiliere';
	$bdd= new PDO($dsn, 'root', '');	
	
	$req1 = 'INSERT INTO quartier (nomquartier, idville) VALUES (:nomquartier,:idville)';
	$req2='INSERT INTO biens (`nombien`, `description`, `prix`, `idcom`, `idquartier`) VALUES (:nombien,:description,:prix,:idcom,:idquartier)';
	$req3 = 'INSERT INTO immeuble VALUES (:idimm, :nbetage)';
	$req4 = 'INSERT INTO image (url, idbiens) VALUES(:url, :idbiens)';
	
	$stmt1=$bdd->prepare($req1);
	$stmt2=$bdd->prepare($req2);
	$stmt3=$bdd->prepare($req3);
	$stmt4=$bdd->prepare($req4);
	
	if(isset($_POST['nombien']) and isset($_POST['description']) and isset($_POST['prix']) and isset($_POST['quartier']) and isset($_POST['type']) and isset($_POST['ville']) and isset($_POST['nbetage'])){
		$idcom = $_SESSION['idcom'];
		$nombien = $_POST['nombien'];
		$description = $_POST['description'];
		$prix = $_POST['prix'];
		$quartier = $_POST['quartier'];
		$type= $_POST['type'];
		$idville = $_POST['ville'];
		$nbetage = $_POST['nbetage'];
	
		if(!empty($nombien) and !empty($description) and !empty($prix) and !empty($quartier) and !empty($type) and !empty($idville) and !empty($nbetage)){
			//On remplit la table quartier
			$stmt1->bindParam(':nomquartier', $quartier);
			$stmt1->bindParam(':idville', $idville);
			$res1 = $stmt1->execute();
			
			if(!$res1)
				echo"Erreur d'insertion dans quartier</br>";
			
			//On remplit la table biens
			
			$stmt2->bindParam(':nombien', $nombien);
			$stmt2->bindParam(':description', $description);
			$stmt2->bindParam(':prix', $prix);
			$stmt2->bindParam(':idcom', $idcom);
			$idquartier=$bdd->lastInsertId();  	//Je recupere l'id du quartier et l'inserer dans la table biens
			$stmt2->bindParam(':idquartier', $idquartier);
			$res2 = $stmt2->execute();
			
			//On remplit la table immeuble
			$idimm = $bdd->lastInsertId();	//Je recupere l'id du biens et l'inserer dans la table immeuble
			$stmt3->bindParam(':idimm', $idimm);
			$stmt3->bindParam(':nbetage', $nbetage);
			$res3 = $stmt3->execute();
			
			//On remplit les 3 image dans la table image
			$urls = faire();
			foreach($urls as $url){
				$stmt4->bindParam(':url', $url);
				$stmt4->bindParam(':idbiens', $idimm);
				$stmt4->execute();
			}
			
			if($res1 && $res2 && $res3){
				echo 'Insertion reussie</br>';
			}
		}
	}
?>
</body>
</html>