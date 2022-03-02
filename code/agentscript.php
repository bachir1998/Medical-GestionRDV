<?php
    session_start();                    
?>

<?php
    $dsn = 'mysql:host=localhost;dbname=medicales';
    $bdd= new PDO($dsn, 'root', '');
    $conf = 0;
    $req = "select * from personne where conf = ?";
    $stmt = $bdd -> prepare($req);
    $stmt -> execute(array($_SESSION['das'],$conf));

    if($stmt->execute())
    {
        $row = $stmt -> fetch();
        while($row)
        {
            <input type="submit" value="">
            
            echo '<article>
                    <form action="agent.php" method="post">
                        <input type="hidden" name="conf" value='.$row[conf].'>
                    </form>
            </article>';
            $row = $stmt -> fetch();
        }
    }
                        
?>