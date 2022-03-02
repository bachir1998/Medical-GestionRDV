<?php
						$dsn = 'mysql:host=localhost;dbname=medicales';
						$bdd= new PDO($dsn, 'root', '');		
						
                        $requete = "INSERT INTO personne (email ,mdp,nom,prenom,age,sexe,tel,nature,matricule) VALUES (:email,:mdp,:nom,:prenom,:age,:sexe,:tel,:nature,:matricule)";
                        $req1='INSERT INTO services (`nomservices`, `idpersonnel`, `idistrict`) VALUES (:nomservices,:idpersonnel,:idistrict)';
                        $select='SELECT * from personne';
                        $save = $bdd->query($select);	
		
                        //Pour chaque biens, on recupere tout ces images et les affiche en slide border:1px white solid;box-shadow: 0 0 10px #555;
                        
                       
                        
                        
                
                                
                        $stmt1=$bdd->prepare($req1);
                
						
						$stmt=$bdd->prepare($requete);
                        $verif=false;
                        $verif1=false;

                        $email = filter_input(INPUT_POST,"email");
                            $mdp = filter_input(INPUT_POST,"mdp");
                            $confmdp = filter_input(INPUT_POST,"confmdp");
							$nom = filter_input(INPUT_POST,"nom");
                            $prenom = filter_input(INPUT_POST,"prenom");
                            $sexe = filter_input(INPUT_POST,"sexe");
                            $nature = filter_input(INPUT_POST,"nature");
							$age = filter_input(INPUT_POST,"age");
                            $tel=filter_input(INPUT_POST,"tel");
							$matricule = filter_input(INPUT_POST,"matricule");
                            $nomservice = filter_input(INPUT_POST,"service");
                            $hopital = filter_input(INPUT_POST,"hopital");

                        if(isset($email) and isset($mdp) and isset($confmdp) and isset($nom) and isset($prenom) and isset($nature) and isset($age) and
                         isset($tel) and isset($matricule) and isset($nomservice) and isset($hopital) ) {
							
                           
							if(!empty($email) and !empty($mdp) and !empty($nom) and !empty($prenom) and !empty($age) and !empty($sexe) and !empty($tel) and !empty($nature) and !empty($matricule) and !empty($confmdp) and !empty($nomservice) ){
                                if($mdp == $confmdp )
                                {
                                    if( $nature == "medecin")
                                    {
                                       
                                        while($saves = $save->fetch()){
                                          
                                          
                                            
                                            if($tel==$saves['tel'])
                                            {
                                                $verif=true;
                                                if($matricule==$saves['matricule'])
                                            {
                                                $verif1=true;
                                        
                                            }
                                                break;
                                            }
                                            else if($matricule==$saves['matricule'])
                                            {
                                                $verif1=true;
                                                break;
                                            }
                                            else
                                            {
                                                $saves=$save->fetch();
                                            }

                                          
                                        
                                        }
                                        if($verif1==true && $verif==true )
                                            echo'le numéro de téléphone et le matricule sont déjà utilisés';
                                        else if($verif==true && $verif1==false)
                                            echo'le numéro de téléphone est déjà utilisé';
                                        else if($verif1==true && $verif==false )
                                            echo'le matricule est déjà utilisé';
                                        
                                        else
                                        {
                                            $stmt->bindParam(':email', $email);
                                            $stmt->bindParam(':mdp', $mdp);
                                            $stmt->bindParam(':nom', $nom);
                                            $stmt->bindParam(':prenom', $prenom);
                                            
                                            $stmt->bindParam(':age', $age);
                                            $stmt->bindParam(':sexe', $sexe);
                                            $stmt->bindParam(':tel', $tel);
                                            $stmt->bindParam(':nature', $nature);
                                            $stmt->bindParam(':matricule', $matricule);
                                            
                                                   
                                            
                                                    foreach($hopital as $district){
                                                        $stmt1->bindParam(':nomservices', $nomservice);
                                                        $stmt1->bindParam(':idpersonnel', $email);
                                                        $stmt1->bindParam(':idistrict', $district);
                                                        $stmt1->execute();
                                                    }
                                           
                                            
                                            if($stmt->execute())
                                                echo 'insertion reussie';
                                            else
                                                echo 'Insertion echouée !!!!';
                                            }
                                        }

									
                                    else{
                                        echo 'nature inconnue';
                                    }
                                 }
                                 
                                 
                                 else{
									echo 'Veuillez bien confirmer le mot de passe';
                                }
                                                
                                        //On remplit les 3 image dans la table image
                                       
                                    
                                
                            }
                          else{
								echo 'Veuillez remplir tous les champs';
							}
                        }
                       
                       
						?>