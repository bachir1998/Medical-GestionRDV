<?php
    $email = filter_input(INPUT_POST,"email");
    $mdp = filter_input(INPUT_POST,"mdp");
    $confmdp = filter_input(INPUT_POST,"confmdp");
    $nom = filter_input(INPUT_POST,"nom");
    $prenom = filter_input(INPUT_POST,"prenom");
    $sexe = filter_input(INPUT_POST,"sexe");
    $nature = filter_input(INPUT_POST,"nature");
    $age = filter_input(INPUT_POST,"age");
    $tel = filter_input(INPUT_POST,"tel");
    $matricule = filter_input(INPUT_POST,"matricule");
    $service = filter_input(INPUT_POST,"service");

    if(isset($email) and isset($mdp) and isset($confmdp)  and isset($nom) and isset($prenom) and isset($sexe) and isset($nature)
        and isset($age) and isset($tel) and isset($matricule) and isset($service))
    {
        echo $service;
    }
?>