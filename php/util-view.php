  
<?php 
session_start();
include('./controller/eleve.php');
include('./controller/enseignant.php');
include('./controller/parent.php');
include('./controller/admin.php');
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
        <center><h1>Gestion des Présentations </h1></center>
        <form class="inline" action="./controller/deconnect.php"  method="post"  >
        <input style="width:250px;"  type="submit" name="dcnt" id="dcnt" value="Déconnexion" >
        </form>
        <a  href="page-view.php" style="color:black;" >Retour à la page d'administration</a>
        <a  href="register-eleve-view.php" style="color:black;" >Gestion compte eleve</a>
        <a  href="register-ens-view.php" style="color:black;" >Gestion compte Enseignant</a>
        <a  href="register-parent-view.php" style="color:black;" >Gestion compte Parent</a>
        <a  href="register-admin-view.php" style="color:black;" >Gestion compte Admin</a>
      

        <br><br><br><br><br>
        <h2>Les Eleves</H2>
        <table id="customers" class="customers" style="position:center;">
                <thead style="color:black;">
                    <tr>
                    <th scope="col" style="background-color:none;" >Matricule</th>
                    <th scope="col" rowspan="3"> Nom  </th>
                    <th scope="col" rowspan="3"> Prénom </th>
                    <th scope="col" rowspan="3"> Adresse </th>
                    <th scope="col" rowspan="3"> Date de naissance </th>
                    <th scope="col" rowspan="3"> Téléphone 1  </th>
                    <th scope="col" rowspan="3"> Téléphone 2  </th>
                    <th scope="col" rowspan="3"> Téléphone 3  </th>
                    <th scope="col" rowspan="3"> Classe </th>
                    <th scope="col" rowspan="3"> Cycle </th>
                    <th scope="col" rowspan="3"> Année </th>
                    <th scope="col" rowspan="3"> Activités extra-scolaires </th>
                    <th scope="col" rowspan="3"> Parents</th>
                    <th scope="col" rowspan="3"> Email  </th>
                    <th scope="col">Mot de passe</th>
                    </tr>               
                </thead>
                <tbody >
                <?php 
                     $classC = new classeleve();
                     $eleves = $classC->get_students();
      
                      foreach ($eleves as $eleve): 
                    ?>
                    <tr><td><?php echo $eleve['id'] ?></td><td><?php echo $eleve['nom'] ?></td><td><?php echo $eleve['prenom'] ?></td><td><?php echo $eleve['adresse'] ?></td>
                    <td><?php echo $eleve['datenaissance'] ?></td><td><?php echo $eleve['tel1'] ?></td><td><?php echo $eleve['tel2'] ?></td><td><?php echo $eleve['tel3'] ?></td>
                    <td><?php echo $eleve['classe'] ?></td><td><?php echo $eleve['cycle'] ?></td><td><?php echo $eleve['annee'] ?></td><td><?php echo $eleve['activite_extrascol'] ?></td><td><?php echo $eleve['parent'] ?></td><td><?php echo $eleve['email'] ?></td>
                    <td><?php echo $eleve['mdp'] ?></td>
                    <td>
                    <form action='./controller/eleve.php' method='post' >
                        <input type='hidden' name='id' value='<?php echo $eleve['id'] ?>'> 
                                                        
                        <input type='submit'  name='supprimer' value='Supprimer'>  
                        </form>    
                    </td>
                  
                        </tr>
              
                     <?php endforeach; ?>
                </tbody>
            </table>
            <br><br><br>

            <br><br><br><br><br>
        <h2>Les Parents</H2>
        <table id="customers" class="customers" style="position:center;">
                <thead style="color:black;">
                    <tr>
                    <th scope="col" style="background-color:none;" >Matricule</th>
                    <th scope="col" rowspan="3"> Nom  </th>
                    <th scope="col" rowspan="3"> Prénom </th>
                    <th scope="col" rowspan="3"> Adresse </th>
         
                    <th scope="col" rowspan="3"> Téléphone 1  </th>
                    <th scope="col" rowspan="3"> Téléphone 2  </th>
                    <th scope="col" rowspan="3"> Téléphone 3  </th>
                    <th scope="col" rowspan="3"> Enfants </th>
  
                    <th scope="col" rowspan="3"> Email  </th>
                    <th scope="col">Mot de passe</th>
                    <th scope="col">Supprimer</th>
                    </tr>               
                </thead>
                <tbody >
                <?php 
                     $classC = new classparent();
                     $ens = $classC->afficherparent();
      
                      foreach ($ens as $en): 
                    ?>
                    <tr><td><?php echo $en['id'] ?></td><td><?php echo $en['nom'] ?></td><td><?php echo $en['prenom'] ?></td>
                    <td><?php echo $en['adresse'] ?></td><td><?php echo $en['tel1'] ?></td><td><?php echo $en['tel2'] ?></td><td><?php echo $en['tel3'] ?></td>
                    <td><?php echo $en['enfant'] ?></td><td><?php echo $en['email'] ?></td>
                    <td><?php echo $en['mdp'] ?></td>
                    <td>
                    <form action='./controller/eleve.php' method='post' >
                        <input type='hidden' name='id' value='<?php echo $en['id'] ?>'> 
                                                        
                        <input type='submit'  name='supprimer' value='Supprimer'>  
                        </form>    
                    </td>
                  
                        </tr>
              
                     <?php endforeach; ?>
                </tbody>
            </table>
            <br><br><br>
            <br><br><br><br><br>
        <h2>Les Enseignants</H2>
        <table id="customers" class="customers" style="position:center;">
                <thead style="color:black;">
                    <tr>
                    <th scope="col" style="background-color:none;" >Matricule</th>
                    <th scope="col" rowspan="3"> Nom  </th>
                    <th scope="col" rowspan="3"> Prénom </th>
                    <th scope="col" rowspan="3"> Adresse </th>
         
                    <th scope="col" rowspan="3"> Téléphone 1  </th>
                    <th scope="col" rowspan="3"> Téléphone 2  </th>
                    <th scope="col" rowspan="3"> Téléphone 3  </th>
                    <th scope="col" rowspan="3"> Module </th>
  
                    <th scope="col" rowspan="3"> Email  </th>
                    <th scope="col">Mot de passe</th>
                    <th scope="col">Supprimer</th>
                    </tr>               
                </thead>
                <tbody >
                <?php 
                     $classC = new enseignant_cont();
                     $enss = $classC->get_teachers();
      
                      foreach ($enss as $ens): 
                    ?>
                    <tr><td><?php echo $ens['id'] ?></td><td><?php echo $ens['nom'] ?></td><td><?php echo $ens['prenom'] ?></td>
                    <td><?php echo $ens['adresse'] ?></td><td><?php echo $ens['tel1'] ?></td><td><?php echo $ens['tel2'] ?></td><td><?php echo $ens['tel3'] ?></td>
                    <td><?php echo $ens['module'] ?></td><td><?php echo $ens['email'] ?></td>
                    <td><?php echo $ens['mdp'] ?></td>
                    <td>
                    <form action='./controller/eleve.php' method='post' >
                        <input type='hidden' name='id' value='<?php echo $ens['id'] ?>'> 
                                                        
                        <input type='submit'  name='supprimer' value='Supprimer'>  
                        </form>    
                    </td>
                  
                        </tr>
              
                     <?php endforeach; ?>
                </tbody>
            </table>
            <br><br><br>
            <br><br><br><br><br>
        <h2>Les Administrateur</H2>
        <table id="customers" class="customers" style="position:center;">
                <thead style="color:black;">
                    <tr>
                    <th scope="col" style="background-color:none;" >Matricule</th>
                    <th scope="col" rowspan="3"> Nom  </th>
                    <th scope="col" rowspan="3"> Prénom </th>
                    <th scope="col" rowspan="3"> Adresse </th>
         
                    <th scope="col" rowspan="3"> Téléphone 1  </th>
                    <th scope="col" rowspan="3"> Téléphone 2  </th>
                    <th scope="col" rowspan="3"> Téléphone 3  </th>
                 
  
                    <th scope="col" rowspan="3"> Email  </th>
                    <th scope="col">Mot de passe</th>
                    <th scope="col">Supprimer</th>
                    </tr>               
                </thead>
                <tbody >
                <?php 
                     $classC = new classadmin();
                     $admins = $classC->afficheradmins();
      
                      foreach ($admins as $admin): 
                    ?>
                    <tr><td><?php echo $admin['id'] ?></td><td><?php echo $admin['nom'] ?></td><td><?php echo $admin['prenom'] ?></td>
                    <td><?php echo $admin['adresse'] ?></td><td><?php echo $admin['tel1'] ?></td><td><?php echo $admin['tel2'] ?></td><td><?php echo $admin['tel3'] ?></td>
                   <td><?php echo $admin['email'] ?></td>
                    <td><?php echo $admin['mdp'] ?></td>
                    <td>
                    <form action='./controller/eleve.php' method='post' >
                        <input type='hidden' name='id' value='<?php echo $admin['id'] ?>'> 
                                                        
                        <input type='submit'  name='supprimer' value='Supprimer'>  
                        </form>    
                    </td>
                  
                        </tr>
              
                     <?php endforeach; ?>
                </tbody>
            </table>
            <br><br><br>
           
            
         
           
 
         


</body>


</html>