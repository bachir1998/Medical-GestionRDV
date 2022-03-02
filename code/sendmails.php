<?php 

// From: https://stackoverflow.com/questions/5335273/how-to-send-an-email-using-php
function sendmail($to, $message){
	$subject = "Gestion RDV : Notification";
	$headers = 'From: saradiallo44@gmail.com' . "\r\n" .
		'Reply-To: saradiallo44@gmail.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

	mail($to, $subject, $message, $headers);
}

if(isset($_GET["exec"]) && ($_GET["exec"] == 'true')){
	include(__DIR__ . "/shared.php");
	// Connexion à la base
	$error = 0;
	$con = openDB($error);
	// $sql = "SELECT email, tel, pwd, prenom, nom FROM enqueteur WHERE tel=771638038";
	$sql = "SELECT email, tel, pwd, prenom, nom FROM enqueteur WHERE (NOT ISNULL(email)) AND (LENGTH(email)>4)";
	$rows = execQuery($sql, $con);
	foreach($rows as $row){
		$message = "Bonjour $row[3] $row[4],\nVos parametres de connexion sont:\nIdentifiant: $row[1]\nMot de passe: $row[2]\n\nNe répondez pas à ce mail. C'est un mail automatique.";
		sendmail($row[0], $message);
	}
	echo sizeof($rows) . " mails envoyés";
}
else
	echo "Aucun mail n'est envoyé."

?>