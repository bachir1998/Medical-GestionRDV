<?php
                                      $dsn = 'mysql:host=localhost;dbname=medicales';
                                      $bdd= new PDO($dsn, 'root', '');		
                                      
                                                
                                      $select = "SELECT * FROM rdv r join notifications s on r.idrdv = s.idrdv  WHERE r.idpatient like ? and s.etat like ? order by lastmdf DESC ";
                                      $stmt = $bdd -> prepare($select);
                                      $stmt -> execute(array($_SESSION['email'],"non_lus"));
                                      $row = $stmt -> fetchAll();
                                      $i = count($row);
                                      
                                      
                                      
                                      echo $i;
                                    ?></span></a>
                                <div id='notif' class="dropdown-menu" arial-labelledby="dropdown01" >
                                  
                                    
                                    <?php
                                    $j = 0;
                                      foreach($row as $v)
                                      {
                                      echo "<a class='dropdown-item'  href='#'>";
                                      $idmes = $v["idnotif"];
                                      $mes = $v["message"];
                                      $l = $v["lastmdf"];
                                      echo "
                                              <p id='mes$j' >$mes $l</p>
                                          </a>";
                                          echo "<script type='text/javascript'>
                                      $(document).ready(function(){;
                                        $('p#mes$j').on('click', function(e){
                                          
                                            alert('$idmes');
                                            $.post(
                                              'view.php',
                                              {
                                                idnotif:'$idmes',
                                      
                                              },
                                              function(data){
                                                alert(data);
                                              }
                                            );
                                            
                                            
                                        });
                                      });
                                    </script>";
                                          $j++;
                                      }
                                      
                                    ?>
                                    
                                  