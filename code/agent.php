<?php
	session_start();
?>

<!DOCTYPE html>

<html >
    <head>
    <meta charset="utf-8" />	
    <link rel="stylesheet" href="../css/tester.css?<?php echo time();?>"/>
    <link rel="stylesheet" href="../css/tester2.css?<?php echo time();?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    rel="stylesheet">
  
    <link rel="stylesheet"  href="../bootstrap/css/bootstrap.css"/>
    <script src="../jquery-3.4.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"> </script>
    <script src="script.js"> </script>
      
        <title>Gestion des RDV</title>
    </head>
    <body>
    <div class="container">
		<div class='row'>
			<div class='col-lg-12'><center>
				<nav class="navbar  navbar-default " >
                    <img style="float: left;width : 40px;height : 40px;margin:0.5%; border : 50%;" src='im_header.PNG' alt="logo"/>
                    <div class="navbar-collapse collapse navbar-center"  style="color : white">
                            
                        <ul class="nav navbar-nav" >
                            <li >  <a href="accueil.php">Accueil</a> </li>
                            <li >  <a href="agent.php">Ajouter District</a> </li>
                            <li>  <a href="listpatient.php">liste patient</a></li>
                            <li>  <a href="listmedecin.php">liste medecin</a></li>
                            
                           </ul>
                            <li><a href="#"><?php
                      $dsn = 'mysql:host=localhost;dbname=medicales';
                      $bdd= new PDO($dsn, 'root', '');		
                      
                                
                      $select = "SELECT * FROM agent  WHERE logins like ? ";
                      $stmt = $bdd -> prepare($select);
                      $stmt -> execute(array($_SESSION['login']));

                      if($stmt->execute())
                      {
                        $row = $stmt -> fetch(); 
                        $t = 0;
                        
                        while($row)
                        { $t++;
                          
                          echo '
                              <span class="badge badge-light">Bonjour '.$row["prenom"].' '.$row["nom"].'</span>';
                          $row = $stmt -> fetch();
                        }
                        
                        
                      }
                      else
                        echo "echec";
                    ?></a></li>                                          
                        
                    </div>
                
                </nav></center>
                <header class="now">
                <center><h1 style="animation: flash 1.4s linear infinite;margin-top:2%;letter-spacing:5px;margin-left:-10%;">Gestion des RDV</h1>
                <h3  style="margin-left:-8%;">La santé avant tout</h3></center>
              
                  
                </header>
               
              <script>

$(".now").hide(0,'linear')

$(".now").slideDown(1000,'linear');



</script>  

<!--insertion du district-->
<br/>
<fieldset> 
<center><legend class="btn btn-info">AJOUTER UN DISTRICT</legend></center>
<br/>
<form class="form-inline" method="post" action="agent.php">
  <div class="form-group">
      <label for="exampleFormControlSelect1">Commune : </label>
      <select class="form-control" id="exampleFormControlSelect1" name="com">
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
          <option value='.$row["nomdcom"].'>'.$row["nomdcom"].'</option>';
          
        $row = $stmt -> fetch();
      
        }
        
      ?>
      </select>
    </div>
    
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" >Nom District : </label>
    <input type="text" name="dist" class="form-control" id="inputPassword2" placeholder="nom distrct" required>
  </div>
  <button type="submit" class="btn btn-success mb-2">Enregistrer</button>
</form>
</fieldset>

</tr >
<?php
  $dsn = 'mysql:host=localhost;dbname=medicales';
  $bdd= new PDO($dsn, 'root', '');
  $idcom = 0;
 
  
   if(isset($_POST["com"]) and isset($_POST["dist"]) and !empty($_POST["com"]) and !empty($_POST["dist"]))
   {
      $com = $_POST["com"];
      $dist = $_POST["dist"];
      $select = "SELECT * FROM commune where nomdcom like '$com' ";
      $stmt = $bdd -> query($select);
    
      $row = $stmt -> fetch(); 
      $t = 0;
    
      while($row)
      { 
        $idcom = $row['idcom'];
        $row = $stmt -> fetch();
      }		
      
      $select = 'SELECT * FROM district where nomdistrict  like ? and  idcom = "'.$idcom.'" ';
      $stmt=$bdd->prepare($select);
      if(!empty($idcom) and !empty($dist)){
         {
             $stmt->bindParam(1, $dist);
             $stmt->execute();
             $t=0;
             while($row=$stmt->fetch()){
             
             $t=1;
             $_SESSION['nomdistrict'] = $row['nomdistrict'];
             $_SESSION['idcom'] = $row['idcom'];
         
             break;
         }
     }
    }
   
     if($t!=1)
     {
         $req = "insert into district (nomdistrict,idcom) values ('$dist','$idcom')";
          $result = $bdd -> exec($req);
          echo "<script type = \"text/javascript\">
          alert('Le district est enregistré avec succés !!!')</script>";
     }  

      
      else
      {
          //$mess_erreur1 = $bdd->errorInfo();
          //echo "Insertion impossible !!! ", $bdd->errorCode(), $mess_erreur1[2];
         // echo "<script type = \"text/javascript\">
         // alert('ERREUR :".$bdd->errorCode()."')</script>";
         echo "<script type = \"text/javascript\">
         alert('ERREUR :".$bdd->errorCode()."')</script>";
      }
    
   }
  
  
?>
<br>
<!--insertion commune-->
<fieldset> 
<center><legend class="btn btn-info">AJOUTER UNE COMMUNE</legend></center>
<br>
<form class="form-inline" method="post" action="agent.php">
  <div class="form-group">
      <label for="exampleFormControlSelect1">Departement : </label>
      <select class="form-control" id="exampleFormControlSelect1" name="dept">
      <?php
        $dsn = 'mysql:host=localhost;dbname=medicales';
        $bdd= new PDO($dsn, 'root', '');		

            
        $select = "SELECT * FROM departement ";
        $stmt = $bdd -> query($select);

        $row = $stmt -> fetch(); 
        $t = 0;

        while($row)
        { 

        echo '
          <option value='.$row["nomdept"].'>'.$row["nomdept"].'</option>';
        $row = $stmt -> fetch();
        }
        
      ?>
      </select>
    </div>
    
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" >Nom Commune : </label>
    <input type="text" name="commune" class="form-control" id="inputPassword2" placeholder="nom commune" required >
  </div>
  <button type="submit" class="btn btn-success mb-2">Enregistrer</button>
</form>
</fieldset>
<?php
  $dsn = 'mysql:host=localhost;dbname=medicales';
  $bdd= new PDO($dsn, 'root', '');
  $idept = 0;
  
   if(isset($_POST["dept"]) and isset($_POST["commune"]) and !empty($_POST["dept"]) and !empty($_POST["commune"]))
   {
      $dept = $_POST["dept"];
      $commune = $_POST["commune"];
      $select1 = "SELECT * FROM departement where nomdept like '$dept' ";
      $stmt1 = $bdd -> query($select1);
    
      $row1 = $stmt1 -> fetch(); 
      $t = 0;
    
      while($row1)
      { 
        $idept = $row1['idept'];
        $row1 = $stmt1 -> fetch();
      }		
      

      $req1 = "insert into commune (nomdcom,idept)
              values ('$commune','$idept')";
        $result1 = $bdd -> exec($req1);
      if($result1 != 1)
      {
          $mess_erreur1 = $bdd->errorInfo();
          echo "Insertion impossible !!! ", $bdd->errorCode(), $mess_erreur1[2];
          echo "<script type = \"text/javascript\">
          alert('ERREUR :".$bdd->errorCode()."')</script>";
      }
      else
      {
          echo "<script type = \"text/javascript\">
          alert('La commune est enregistré avec succés !!!')</script>";
      }
   }
  
  
?>

  <footer id="footer" class="foot">
   <div class="footer-top  footer-default">
     <div class="container">
       <div class="row">
           <div class="col-lg-4 col-md-6 footer-info"> 
               <h3 style="animation: flash 1.4s linear infinite"> Obtenez un RV facilement</h3>
               <p> ________ ________ ________ ________ _________
                   ________  _______ _________  _______  _______
                   ________ _________ ___________</p>
            </div>
            <div class="col-lg-2 col-md-6 footer-links">
               <h4> Liens utiles <h4>
                 <ul>
                      <li><a href="#">Link</a></li>
                      <li><a href="#">Link</a></li>
                      <li><a href="#">Link</a></li>
                      <li><a href="#">Link</a></li>
                      <li><a href="#">Link</a></li>
                 </ul>
             </div>
             <div class="col-lg-3 col-md-6 footer-contact"> 
               <h4> Contactez-nous</h4>
                <p>
                  Hann Bel Air   Rue:6 <br/>
                  Hann,  Dakar<br/>
                  Sénégal<br/>
                  <strong>Téléphone:</strong>+221 78 130 45 98<br/> 
                  <strong>Em@il:</strong>BAM@gmail.com<br/>
                 </p>
          
                 <div class="social-links">
                    <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#" class="twitter"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="twitter"><i class="fa fa-instagram"></i></a> 
                    <a href="#" class="twitter"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="twitter"><i class="fa fa-linkedin"></i></a>      
                 </div> 
                 </div>  
                  <div class="col-lg-3 col-md-6 footer-newsletter">
                  <h4>Our Nemsletter</h4>
                   <p> ________ ________ ________ ________ _________
                   ________  _______ _________  _______  _______
                   ________ _________ ___________</p>
                 <!--  <form accept="" mthod="post">
                     <input type="email"  name="email"/><input type="submit" value="s'abonner"/>
                    </form>-->
                 </div>
    
       </div>
     </div>
    </div>
    <div class="container">
      <div class="copyright">
        &copy; Copyright<strong>WebsiteName</strong>. Tout Droits Reservés
       </div>
       <div class="credits">
          Designed by <a href="#">WebsiteName</a>
       </div>
     </div>
</footer>
<script>

$(".foot").hide(0,'linear')

$(".foot").slideDown(1000,'linear');



</script> 
</div>
		</div>
	</div>

    </body>
    </html>
