<!Doctype html>
<html>
<head>
<title>MaPage web avec POO</title>
<meta charset="utf-8"/>
<link rel=" stylesheet"href="creationCompte.css ?<?php echo time();?> "/> 

</head>
<body>

<header>
   <h2>Book Sanctuary</h2>
</header>

<h1>contact</h1>
<form method="post">

<label>nom</label>
<input type="text" name="nom" required>

<label>email</label>
<input type="email" name="email" required>

<label>message</label>
<textarea name="message" required></textarea>

<input type="submit">


</form>






<?php
 if(isset($_POST['message']))
 {
	 $entete='MIME-Version:1.o'."\r\n";
	 $entete='Content-type:text/html;charset=utf-8'."\r\n";
         $entete='From: '.$_POST['email']."\r\n";
	 
	  $message= $_POST['nom'];
	 
	 $retour=mail('senekhadidiatou97@gmail.com','VisualizeStudio',$message,$entete);
	 
	 if($retour)
	 {
		 echo"reussiiiiiiiiiiiiii";
	 }
	 else
	 { 
      echo"echecccccccccc"; 
	  }
 }

?>
</body>


</html>