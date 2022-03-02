<?php
    session_start();
    $dsn = 'mysql:host=localhost;dbname=medicales';
    $bdd= new PDO($dsn, 'root', '');

        
        
        $req = "SELECT * FROM rdv r join notifications s on r.idrdv = s.idrdv  WHERE r.idpatient like ? and s.etat like ? order by lastmdf DESC " ;
        $stmt = $bdd -> prepare($req);
        $stmt -> execute(array($_SESSION['email'],"non_lus"));
        $i = count($stmt -> fetchAll());
        echo $i;
        
?>