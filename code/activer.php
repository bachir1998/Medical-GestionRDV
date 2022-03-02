<?php 
    $dsn = 'mysql:host=localhost;dbname=medicales';
    $bdd= new PDO($dsn, 'root', '');
    $conf = 10;
    $t = 0;
    $select = "SELECT * FROM personne  WHERE email like  ? ";
    $stmt = $bdd -> prepare($select);
    if($_POST['email'])
    {
        $email = $_POST['email'];
        
        
        $stmt -> execute(array($email));
        if($stmt->execute())
        {
            $row = $stmt -> fetch();
            while($row)
            {
                $t++;
                $row = $stmt -> fetch();
            }

            if($t == 1)
            { 
                    $rdv = "update personne set conf = '1' where email = '$email'";
                    $result = $bdd -> exec($rdv);
                    if($result != 1)
                    {
                        echo "echec de la mise à jour";
                    }
                    else
                    {
                        echo "activation reussi !!!";
                    }
                
            }

        }
        else
        {
            echo 'echec execution';
        }
    }
    else
    {
        echo 'echec isset';
    }

?>