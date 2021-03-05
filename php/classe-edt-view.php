  
<?php 
session_start();
include('./controller/seance.php');
include('./controller/classe.php');
include('./controller/enseignant.php');
if (isset($_SESSION['mail'])){
    $admin=$_SESSION['mail'];
   
}else{
    header("Location: ./connexion-view.php ");
}


 ?>


<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">



</head>

<body style="background-image: url('../images/blue.jpg');">

        <center><h2>EDTs des classes </h2></center>
        <form class="inline" action="./controller/deconnect.php"  method="post"  >
        <input style="width:250px;"  type="submit" name="dcnt" id="dcnt" value="Déconnexion" >
        </form>
        <span>
        <a  href="page-view.php" class="buy" >Retour à la page d'administration</a>
        <a  href="edt-view.php" class="buy" >Retour à la page de gestion des emplois du temps</a>
        <a  href="ens-edt-view.php" class="buy" >Aller voir EDT des enseignants</a>
        </span>
      
  <br><br><br><br><br>
      
   
                    <?php 
                      $clas = new classcont();
                      $classes= $clas->recupclasses();  
                      foreach ( $classes as  $classe): 
                    ?>
                         
                         <h4>Classe : <?php echo $classe['nom'] ?> </h4>
                 <table    id="customers" >
                <thead style="color:black;">
                    <tr>
                    <th scope="col"  >Séance</th>
                    <th scope="col" >Samedi</th>
                    <th scope="col">Dimanche</th>
                    <th scope="col" rowspan="3"> Lundi </th>
                    <th scope="col">Mardi</th>
                    <th scope="col">Mercredi</th>
                    <th scope="col">Jeudi</th>
                    <th scope="col">Vendredi</th>           
                    </tr>               
                </thead>
                <tbody >
                <?php 
                     $classC = new gestionseance();
                     $seances =   $classC->get_seance_by_class_id_day($classe['id'],'samedi');
                      foreach ($seances as$seance): 
                        $ens = new enseignant_cont();
                        $enseignant= $ens->get_enseignant($seance['id_ens']);
                        $module=$enseignant[0]['module'];
                        $hdebut=$seance['heure_debut'];
                        $hfin=$seance['heure_fin'];
                        $jour=$seance['jour'];
                      
                        

                    ?>
                    <tr><td><?php echo $seance['heure_debut']."_".$seance['heure_fin'] ?></td><td><?php echo $module ?></td><td></td><td></td><td>
                  </td><td></td><td></td> 
                    <td>
                     </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php 
                     $classC = new gestionseance();
                     $seances =   $classC->get_seance_by_class_id_day($classe['id'],'dimanche');
                      foreach ($seances as$seance): 
                        $ens = new enseignant_cont();
                        $enseignant= $ens->get_enseignant($seance['id_ens']);
                        $module=$enseignant[0]['module'];
                        $hdebut=$seance['heure_debut'];
                        $hfin=$seance['heure_fin'];
                        $jour=$seance['jour'];
                      
                        

                    ?>
                    <tr><td><?php echo $seance['heure_debut']."_".$seance['heure_fin'] ?></td><td>/</td><td><?php echo $module ?></td><td></td><td>
                  </td><td></td><td></td> 
                    <td>/
                     </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php 
                     $classC = new gestionseance();
                     $seances =   $classC->get_seance_by_class_id_day($classe['id'],'lundi');
                      foreach ($seances as$seance): 
                        $ens = new enseignant_cont();
                        $enseignant= $ens->get_enseignant($seance['id_ens']);
                        $module=$enseignant[0]['module'];
                        $hdebut=$seance['heure_debut'];
                        $hfin=$seance['heure_fin'];
                        $jour=$seance['jour'];
                      
                        

                    ?>
                    <tr><td><?php echo $seance['heure_debut']."_".$seance['heure_fin'] ?></td><td></td><td></td><td><?php echo $module ?></td><td>
                  </td><td></td><td></td> 
                    <td>
                    
                     </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php 
                     $classC = new gestionseance();
                     $seances =   $classC->get_seance_by_class_id_day($classe['id'],'mardi');
                      foreach ($seances as$seance): 
                        $ens = new enseignant_cont();
                        $enseignant= $ens->get_enseignant($seance['id_ens']);
                        $module=$enseignant[0]['module'];
                        $hdebut=$seance['heure_debut'];
                        $hfin=$seance['heure_fin'];
                        $jour=$seance['jour'];
                      
                        

                    ?>
                    <tr><td><?php echo $seance['heure_debut']."_".$seance['heure_fin'] ?></td><td></td><td></td><td>/</td><td><?php echo $module ?>
                  </td><td></td><td></td> 
                    <td>
                     </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php 
                     $classC = new gestionseance();
                     $seances =   $classC->get_seance_by_class_id_day($classe['id'],'mercredi');
                      foreach ($seances as$seance): 
                        $ens = new enseignant_cont();
                        $enseignant= $ens->get_enseignant($seance['id_ens']);
                        $module=$enseignant[0]['module'];
                        $hdebut=$seance['heure_debut'];
                        $hfin=$seance['heure_fin'];
                        $jour=$seance['jour'];
                      
                        

                    ?>
                    <tr><td><?php echo $seance['heure_debut']."_".$seance['heure_fin'] ?></td><td></td><td></td><td></td><td>
                  </td><td><?php echo $module ?></td><td></td> 
                    <td>
                     </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php 
                     $classC = new gestionseance();
                     $seances =   $classC->get_seance_by_class_id_day($classe['id'],'jeudi');
                      foreach ($seances as$seance): 
                        $ens = new enseignant_cont();
                        $enseignant= $ens->get_enseignant($seance['id_ens']);
                        $module=$enseignant[0]['module'];
                        $hdebut=$seance['heure_debut'];
                        $hfin=$seance['heure_fin'];
                        $jour=$seance['jour'];
                      
                        

                    ?>
                    <tr><td><?php echo $seance['heure_debut']."_".$seance['heure_fin'] ?></td><td></td><td></td><td></td><td>
                  </td><td></td><td><?php echo $module ?></td> 
                    <td>
                     </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php 
                     $classC = new gestionseance();
                     $seances =   $classC->get_seance_by_class_id_day($classe['id'],'vendredi');
                      foreach ($seances as$seance): 
                        $ens = new enseignant_cont();
                        $enseignant= $ens->get_enseignant($seance['id_ens']);
                        $module=$enseignant[0]['module'];
                        $hdebut=$seance['heure_debut'];
                        $hfin=$seance['heure_fin'];
                        $jour=$seance['jour'];
                      
                        

                    ?>
                    <tr><td><?php echo $seance['heure_debut']."_".$seance['heure_fin'] ?></td><td></td><td></td><td></td><td>
                  </td><td></td><td></td> 
                    <td>
                    <?php echo $module ?>
                     </td>
                        </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
            
 <br><br><br><br><br>
            <?php endforeach; ?>
           
 
         


</body>


</html>