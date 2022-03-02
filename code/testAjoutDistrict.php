<?php
    $dsn = 'mysql:host=localhost;dbname=medicales';
    $bdd= new PDO($dsn, 'root', '');		

        
    $select = "SELECT * FROM commune ";
    $stmt = $bdd -> query($select);

    $row = $stmt -> fetch(); 
    $t = 0;

    while($row)
    { 

    echo '
        <span class="badge badge-light">Bonjour '.$row["nomdcom"].'</span>';
    $row = $stmt -> fetch();
    }
    
?>