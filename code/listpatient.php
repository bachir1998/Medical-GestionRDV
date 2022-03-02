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
			<div class='col-lg-12'>
				<nav class="navbar  navbar-default navbar-fixed-top" >
                    <img style="float: left;width : 40px;height : 40px;margin:0.5%; border : 50%;" src='im_header.PNG' alt="logo"/>
                    <div class="navbar-collapse collapse navbar-center"  style="color : white">
                            
                        <ul class="nav navbar-nav">
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
                
                </nav>
                <header class="now">
                <center><h1 style="animation: flash 1.4s linear infinite;margin-top:2%;letter-spacing:5px;margin-left:-10%;">Gestion des RDV</h1>
                <h3  style="margin-left:-8%;">La santé avant tout</h3></center>
              
                  
                </header>
               
              <script>

$(".now").hide(0,'linear')

$(".now").slideDown(1000,'linear');



</script> 

<?php 
  $dsn = 'mysql:host=localhost;dbname=medicales';
      $bdd= new PDO($dsn, 'root', '');		
      
      $nature = "patient";
          
      $select = "SELECT * FROM personne  WHERE nature like  ? ";
      $stmt = $bdd -> prepare($select);
      $stmt -> execute(array($nature));

      if($stmt->execute())
      {
        $i = 0;
      $row = $stmt -> fetchAll(); 
      echo "<div id='lesmedecin'><legend class='btn btn-info'><center>LISTE DE TOUS LES MEDECINS</center></legend>";
        echo"<table id='tabl' class='table table-striped table-bordered table-hover'>";
          echo"<thead class='thead-info'><tr>
            <th><center>Email</center></th>
            <th><center>Nom</center></th>
            <th><center>Prenom</center></th>
            <th><center>Age</center></th>
            <th><center>Sexe</center></th>
            <th><center>Telephone<center></th>
            <th><center>nature<center></th>
            
            <th><center>Activer</center></th>
          
          </tr></thead>";
        echo'<tbody>';
            $i = 0;
          foreach($row as $v) 
          {
            $email = $v["email"];
            $conf = "oui";
            if($v["conf"] == 0)
            {
              $conf = "non";
            }
            echo '
              
              <tr>
                <td><center>'.$email.'</center></td>
                <td><center>'.$v["nom"].'</center></td>
                <td><center>'.$v["prenom"].'</center></td>
                <td><center>'.$v["age"].'</center></td>
                <td><center>'.$v["sexe"].'</center></td>
                <td><center>'.$v["tel"].'</center></td>
                <td><center>'.$v["nature"].'</center></td>
                
                <td><center>';
                  if($v["conf"] == 0)
                  {
                    echo "<input class='btn' style='background-color:crimson; color:white' type='button' id='email$i' value='$conf' readonly>";
                  }
                  else
                  {
                    echo "<input class='btn' style='background-color:lightgreen; color:white' type='button' id='email$i' value='$conf' readonly>";
                  }
                  
                echo "	
                </center></td>
              </tr>
              
            ";
            echo "<script type='text/javascript'>
          $(document).ready(function(){;
            $('#email$i').click(function(){
              var currow = $(this).closest('tr');
              var col1 = currow.find('td:eq(0)').text();
              var col9 = $('#email$i').val();
              
              if(col9 == 'non')
              {
                $.post(
                  'activer.php',
                  {
                    email:col1
                  },
                  function(data){
                    alert(data);
                  }
                );
                $('#email$i').val('oui');
                $('#email$i').css('background-color','lightgreen');
                $('#email$i').css('color','white');
              }
              else if(col9 == 'oui')
              {
                $.post(
                  'desactiver.php',
                  {
                    email:col1
                  },
                  function(data){
                    alert(data);
                  }
                );
                $('#email$i').val('non');
                $('#email$i').css('background-color','crimson');
                $('#email$i').css('color','white');
              }
            
            });
            });
        </script>";
            $i++;
            
          }
        
        echo"</tbody></table>";
        
      
      
      }
      else
      echo "echec";
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
                   <form accept="" mthod="post">
                     <input type="email"  name="email"/><input type="submit" value="s'abonner"/>
                    </form>
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
