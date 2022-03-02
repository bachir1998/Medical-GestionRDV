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
    <script src='../js/bootstrap.js'></script>
    <script src='jquery-3.4.1.min.js'></script>
</head>
<body style="padding-top : 70px;  font-size : 20px; background : #2F4F4F ;margin-left : 7%; margin-right : 7%;">

	<?php		//Traitement du formulaire
	// ===========================================================================================================================================
    Function valid_extension($file)
    {
       $tab=array("jpg", "png", "jpeg", "gif");
       $ext=strtolower(substr(strrchr($file,'.'),1));
       if(in_array($ext,$tab))
          return true;
        return false;
    }
    Function max_size($file)
    {
        $maxsize=100000000000000000000000000000;
        if(isset($_POST['$file']['MAX_FILE_SIZE'])){
            $maxsize=$_POST['MAX_FILE_SIZE'];
        if($file['size']<=$maxsize)
            return true;
        return false;
        }
    }
    Function move_file($sourcefile, $destpath, $destname){
        if(!(is_dir($destpath)))
            mkdir($destpath);
        $dest=$destpath."/".$destname;
        $destname="im_ser_".$destname;
        $dest=$destpath."/".$destname;
        move_uploaded_file($sourcefile, $dest);
        // echo "Destpath=".$destpath." ";
        // echo "</br>Dest=".$dest;
        return $dest;
    }
    Function faire(){
        if(isset($_FILES['photo'])){
            if($_FILES['photo']['error']==0){
                $file=$_FILES['photo'];
                $file_name=$file['name'];
                if(valid_extension($file_name)){
                    // if(max_size($file)){
                    if(move_file($file['tmp_name'], "tofs_server",$file['name'])){
                        $d=move_file($file['tmp_name'], "tofs_server",$file['name']);
                        return $d;
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
?>
<form class='col-lg-12 'method='post' action='services1.php' enctype='multipart/form-data'>
	<fieldset>
	<legend>Publication de biens</legend>
	<div class='row'>
		<div class='col-xs-6'>
			<select class='form-control' name='nomservice'>
				<option value=''>Type de Services</option>
				<option value='Odontologie'>Odontologie</option>
				<option value='Ophtalmologie'>Ophtalmologie</option>
				<option value='ORL'>ORL</option>
			</select>
		</div>
		<div class='col-xs-6'>
			<span style='font-weight : bold; margin-bottom : 1px;'>Ajouter une photo</span>
			
            <input  class='form-control'  type='file' name='photo'  accept="image/*">
            <input type='hidden' name='MAX_FILE_SIZE' value='1000000'/>
			
		</div>
	</div>
	</br><button class='btn btn-primary' type='submit'>Publication</button>
	<a href='pagemed.php' class="btn btn-primary" style="float:right">Retourner</a>
	</fieldset>
</form>

<?php
	$dsn = 'mysql:host=localhost;dbname=medicales';
	$bdd= new PDO($dsn, 'root', '');	
	
	
	$req1 = 'INSERT INTO image (url, nomservices) VALUES(:url, :nomservices)';
	
	$stmt1=$bdd->prepare($req1);
	
	
	
	if(isset($_POST['nomservice']) ){
		
		$nomservice = $_POST['nomservice'];
		
		
	
		if(!empty($nomservice)){
			//On remplit la table quartier
			//On remplit la table services
			
				$url=faire();		
            //On remplit les 3 image dans la table image
        
           	$stmt1->bindParam(':url', $url);
				$stmt1->bindParam(':nomservices', $nomservice);

		
			
			if($stmt1->execute()){
				echo 'Insertion reussie</br>';
			}
		}
	}
?>
</body>
</html>