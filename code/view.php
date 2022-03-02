<?php
    $dsn = 'mysql:host=localhost;dbname=medicales';
    $bdd= new PDO($dsn, 'root', '');

    if(isset($_POST['idnotif']) and !empty(['idnotif']))
    {
        $idnotif = $_POST['idnotif'];
        $i = $_POST['i'];
        $etat = "lus";
        $req = "update notifications set etat = '$etat' where idnotif = '$idnotif'" ;
        $bdd -> exec($req);
        
    }
?>